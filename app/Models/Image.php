<?php

namespace App\Models;

use App\Models\ImageType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    protected $fillable=['path','image_type_id'];
    public function imageTypes():BelongsTo
    {
        return $this->belongsTo(ImageType::class);
    }
}
