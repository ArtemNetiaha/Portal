<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'about',
        'facebook',
        'instagram'
    ];

    public function getByLocale():Setting
    {
        $locale=app()->getLocale();
        $this->title=json_decode($this->title)->{$locale};
        $this->description=json_decode($this->description)->{$locale};
        $this->about=json_decode($this->about)->{$locale};
        return $this;
    }
}
