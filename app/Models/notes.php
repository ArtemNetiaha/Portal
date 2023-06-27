<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class notes extends Model
{
    protected $fillable=['text','notable_type','notable_id'];
    use HasFactory;
    public function notable():MorphTo
    {
        return $this->morphTo();
    }
}
