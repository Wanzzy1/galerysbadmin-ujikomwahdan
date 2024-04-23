<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    protected $table ='albums';
    protected $guarded = ['id'];
    public function albumPhotos(){
        return $this->hasMany(Photo::class,'album_id');
    }
}
