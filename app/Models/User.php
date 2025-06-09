<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'User';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $fillable = ['username', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_user', 'id_user');
    }

    public function watchlists()
    {
        return $this->hasMany(Watchlist::class, 'id_user', 'id_user');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}