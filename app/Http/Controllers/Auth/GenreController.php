<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required|string|max:50|unique:Genre',
        ]);

        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre berhasil ditambahkan.');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'nama_genre' => 'required|string|max:50|unique:Genre,nama_genre,' . $genre->id_genre . ',id_genre',
        ]);

        $genre->update($request->all());
        return redirect()->route('genres.index')->with('success', 'Genre berhasil diperbarui.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre berhasil dihapus.');
    }
}