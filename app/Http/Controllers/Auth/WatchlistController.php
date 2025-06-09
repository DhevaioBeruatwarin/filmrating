<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $watchlists = Auth::user()->isAdmin()
            ? Watchlist::with(['user', 'film'])->get()
            : Watchlist::where('id_user', Auth::id())->with(['user', 'film'])->get();
        return view('watchlists.index', compact('watchlists'));
    }

    public function create()
    {
        $films = Film::all();
        return view('watchlists.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_film' => 'required|exists:Film,id_film',
        ]);

        Watchlist::create([
            'id_user' => Auth::id(),
            'id_film' => $request->id_film,
            'tanggal' => now(),
        ]);

        return redirect()->route('watchlists.index')->with('success', 'Film ditambahkan ke watchlist.');
    }

    public function destroy(Watchlist $watchlist)
    {
        $this->authorize('delete', $watchlist);
        $watchlist->delete();
        return redirect()->route('watchlists.index')->with('success', 'Film dihapus dari watchlist.');
    }
}