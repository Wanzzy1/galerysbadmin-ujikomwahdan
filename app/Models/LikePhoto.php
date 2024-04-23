<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model
{
    use HasFactory;

    protected $table = 'like_photos';

    protected $fillable = [
        'foto_id',
        'user_id',
        'tanggal_id',
    ];
    
}
