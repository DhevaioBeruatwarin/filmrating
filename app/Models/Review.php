<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'Review';
    protected $primaryKey = 'id_review';
    public $incrementing = true;
    protected $fillable = ['id_user', 'id_film', 'nilai', 'komentar', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function film()
    {
        return $this->belongsTo(Film::class, 'id_film', 'id_film');
    }
}