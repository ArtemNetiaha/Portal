<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageType extends Model
{
    use HasFactory;
    protected $fillable=['name','sort'];
    public function images():HasMany
    {
        return $this->hasMany(Image::class);
    }
}
