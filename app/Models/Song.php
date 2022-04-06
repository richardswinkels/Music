<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'singer'];

    /**
     * The albums that belong to the song.
     */
    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }
}
