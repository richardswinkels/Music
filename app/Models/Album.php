<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'year', 'times_sold'];
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the band that owns the album.
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }

    /**
     * The songs that belong to the album.
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
