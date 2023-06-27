<?php
namespace App\Services;

class FileService
{
    public static function createPublicFolderIfNotExists(string $folder): void{
    if(!\File::exists(public_path($folder))){
        \File::makeDirectory(public_path($folder));
        }
    }
    public function createStorageFolderIfNotExists(string $folder): void{
    if(!\File::exists(storage_path($folder))){
        \File::makeDirectory(storage_path($folder),0755, true);
        }
    }
}