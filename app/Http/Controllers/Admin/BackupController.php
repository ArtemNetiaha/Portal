<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupFileRequest;
use App\Http\Requests\StoreBackupRequest;
use App\Http\Requests\UpdateBackupRequest;
use App\Models\Backup;
use App\Services\FileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    const TABLES = ['reactions', 'blocks', 'comments',
                    'post_tag', 'posts',
                    'tags', 'categories',
                    'images','image_types'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $backups = Backup::latest()->get();
        return view('admin.backups.index', compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.backups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBackupRequest $request, FileService $service)
    {
        try {
            DB::beginTransaction();
            $backup = Backup::create($request->validated());

            File::copyDirectory(storage_path('app/public'), storage_path("backups/$backup->id/files"));

            FileService::createPublicFolderIfNotExists('sql');

            MySql::create()
                ->setDbName(env('DB_DATABASE'))
                ->setUserName(env('DB_USERNAME'))
                ->setPassword(env('DB_PASSWORD'))
                ->includeTables(self::TABLES)
                ->dumpToFile("sql/dump.sql");

            $service->createStorageFolderIfNotExists("backups/$backup->id/sql");

            File::copy(public_path("sql/dump.sql"), storage_path("backups/$backup->id/sql/dump.sql"));
            File::deleteDirectory(public_path('sql'));

        } catch (\Exception $e) {
            DB::rollBack();
            File::deleteDirectory(storage_path("backups/$backup->id"));
            Log::error($e);
            return to_route('admin.backups.index')
                ->with(['message' => $e->getMessage(), 'color' => 'danger']);
        }

        DB::commit();
        return to_route('admin.backups.index')
            ->with(['message' => 'Backup was created']);
    }

    public function recover(Backup $backup)
    {
        if(is_dir(storage_path("backups/$backup->id"))&&
           file_exists(storage_path("backups/$backup->id/sql/dump.sql"))) {

            File::copyDirectory(storage_path("backups/$backup->id/files"), storage_path('app/public'));
            foreach (self::TABLES as $table) {
                Schema::dropIfExists($table);
            }
            DB::unprepared(file_get_contents(storage_path("backups/$backup->id/sql/dump.sql")));
        } else {
            return to_route('admin.backups.index')
                ->with(['message' => 'Files not found', 'color' => 'danger']);
        }

        return to_route('admin.backups.index')->with(['message' => 'Backup was restored']);
    }

    public function download(Backup $backup)
    {
        $date = $backup->created_at->format('Y-m-d');

        $zip_file = "backup-$date.zip";
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $path = storage_path("backups/$backup->id");
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $file)
        {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        return response()->download($zip_file);
    }

    public function createFromFile()
    {
        return view('admin.backups.create-from-file');
    }

    public function storeFromFile(StoreBackupFileRequest $request)
    {
        try {
            DB::beginTransaction();
            $backup = Backup::create(['name' => $request->name, 'is_from_file' => 1]);

            $zip = new \ZipArchive();
            $status = $zip->open($request->file("archive")->getRealPath());
            if ($status !== true) {
                throw new \Exception($status);
            } else {
                $storageDestinationPath = storage_path("backups/$backup->id/");

                if (!\File::exists($storageDestinationPath)) {
                    \File::makeDirectory($storageDestinationPath, 0755, true);
                }
                $zip->extractTo($storageDestinationPath);
                $zip->close();
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return to_route('admin.backups.index')
                ->with(['message' => $e->getMessage(), 'color' => 'danger']);
        }

        DB::commit();
        return to_route('admin.backups.index')
            ->with(['message' => 'Backup from file was created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Backup $backup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backup $backup)
    {
        return view('admin.backups.edit', compact('backup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBackupRequest $request, Backup $backup)
    {
        $backup->update($request->validated());
        return to_route('admin.backups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Backup $backup)
    {
        $backup->delete();
        return to_route('admin.backups.index');
    }
}
