<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reviews = Auth::user()->isAdmin()
            ? Review::with(['user', 'film'])->get()
            : Review::where('id_user', Auth::id())->with(['user', 'film'])->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $films = Film::all();
        return view('reviews.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_film' => 'required|exists:Film,id_film',
            'nilai' => 'required|integer|min:1|max:10',
            'komentar' => 'nullable|string',
        ]);

        Review::create([
            'id_user' => Auth::id(),
            'id_film' => $request->id_film,
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'tanggal' => now(),
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);
        $films = Film::all();
        return view('reviews.edit', compact('review', 'films'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);
        $request->validate([
            'id_film' => 'required|exists:Film,id_film',
            'nilai' => 'required|integer|min:1|max:10',
            'komentar' => 'nullable|string',
        ]);

        $review->update([
            'id_film' => $request->id_film,
            'nilai' => $request->nilai,
            'komentar' => $request->komentar,
            'tanggal' => now(),
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review berhasil diperbarui.');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review berhasil dihapus.');
    }
}