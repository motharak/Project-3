<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $primaryKey = 'genre_id';

    public $fillable = ['genre_name'];
    public $timestamps = true;
}
