<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'Film';
    protected $primaryKey = 'id_film';
    public $incrementing = true;
    protected $fillable = ['judul', 'sutradara', 'genre_id', 'tahun'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id_genre');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_film', 'id_film');
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class, 'id_film', 'id_film');
    }
}