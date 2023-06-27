<?php

namespace App\Models;

use App\Models\Block;
use App\Models\notes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable;
    const PER_PAGE = 6;
    

    protected $fillable = ['title', 'slug', 'description', 'body', 'image', 'category_id', 'user_id','show','created_at'];

    public function prunable ()
    {
        return static::where('deleted_at','<=', now()->subWeek());
    }
    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function reactions(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'reaction',
            'post_id',
            'user_id'
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function blocks():MorphMany
    {
        return $this->morphMany(Block::class, 'blockable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function commentsCount(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');

    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)
            ->whereNull('comment_id')
            ->with('comments.user');
    }
   
    

    






    public function scopeCategory(Builder $query, int|null $categoryId): void
    {
        $query->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    public function scopeTag(Builder $query, int|null $tagId): void
    {
        $query->when($tagId, function ($query) use ($tagId) {
            $query->whereHas('tags', function ($query) use ($tagId) {
                $query->where('tag_id', $tagId);
            });
        });
    }

    public function scopeSearch(Builder $query, string|null $search): void
    {
        $query->when($search, function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
    }
    public function scopeDateFilter(Builder $query, string|null $date){
            $query ->when($date, function($query)use ($date){
            $dateArray=explode('.',$date);
            $month=$dateArray[0];
            $year=$dateArray[1];
            $query->whereMonth('created_at', $month)->whereYear('created_at', $year);
        });
    }

    public function deleteImage(): void
    {
        if (\File::exists(public_path($this->image))) {
            \File::delete(public_path($this->image));
        }
    }
    public static function uploadImage($image):array{
        $fields=[];
        if ($image) {

            $filename = rand(1000000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images', $image, $filename);
            $fields += ['image' => "storage/images/$filename"];
        }
        return $fields;
    }


}
