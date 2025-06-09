<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Auth\Access\HandlesAuthorization;

class WatchlistPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Watchlist $watchlist)
    {
        return $user->id_user === $watchlist->id_user || $user->isAdmin();
    }
}