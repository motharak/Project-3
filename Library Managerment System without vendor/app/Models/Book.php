<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Define the table associated with the model
    protected $table = 'books';

    // Define the primary key of the table
    protected $primaryKey = 'book_id';

    // Specify if the model's primary key is an incrementing integer
    public $incrementing = true;

    // Define the type of the primary key (integer by default)
    protected $keyType = 'int';

    // Indicates if the model should be timestamped
    public $timestamps = true;

    // The attributes that are mass assignable
    protected $fillable = [
        'title',
        'author_id',
        'genre_id',
        'ISBN',
        'published_date',
        'quantity_available',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'published_date' => 'date',
    ];

    // Relationships with other models
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
