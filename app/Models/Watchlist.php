<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    protected $table = 'Watchlist';
    protected $primaryKey = 'id_watchlist';
    public $incrementing = true;
    protected $fillable = ['id_user', 'id_film', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film', 'id_film');
    }
}