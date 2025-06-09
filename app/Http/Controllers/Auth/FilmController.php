<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $films = Film::with('genre')->get();
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'sutradara' => 'nullable|string|max:100',
            'genre_id' => 'required|exists:Genre,id_genre',
            'tahun' => 'nullable|integer',
        ]);

        Film::create($request->all());
        return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'sutradara' => 'nullable|string|max:100',
            'genre_id' => 'required|exists:Genre,id_genre',
            'tahun' => 'nullable|integer',
        ]);

        $film->update($request->all());
        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }
}