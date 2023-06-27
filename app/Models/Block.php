<?php

namespace App\Models;

use App\Models\Block;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Block extends Model
{
    use HasFactory;
    protected $fillable=['title','content', 'show','sort','post_id', 'type'];

    public static function massUpdate(array|null $blocks, array|null $files)
    {

        foreach ($files ?? [] as $id=>$fileArray){
            foreach ($fileArray as $key=>$image) {
                $filename = rand(1000000000, 9999999999) . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs("blocks/$id", $image, $filename);

                $blocks[$id][$key]="storage/blocks/$id/$filename";

            }
        }

        DB::transaction(function() use($blocks) {
            foreach ($blocks ?? [] as $id =>$options){
                $jsonOptions=json_encode($options);
                Block::where('id', $id)
                    ->update(['content'=>$jsonOptions]);
            }
        });
    }

    public function blockable():MorphTo
    {
        return $this->morphTo();
    }
    public function blocks():MorphMany
    {
        return $this->morphMany(Block::class, 'blockable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
