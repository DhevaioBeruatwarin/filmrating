<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'Genre';
    protected $primaryKey = 'id_genre';
    public $incrementing = true;
    protected $fillable = ['nama_genre'];

    public function films()
    {
        return $this->hasMany(Film::class, 'genre_id', 'id_genre');
    }
}