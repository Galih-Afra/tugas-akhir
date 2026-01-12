<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::latest()->paginate(10);
        return view('admin.comics.index', compact('comics'));
    }

    public function create()
    {
        return view('admin.comics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $comic = Comic::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Upload cover jika ada
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');
            $comic->cover_image = $path;
            $comic->save();
        }

        return redirect()->route('admin.comics.index')
            ->with('success', 'Komik berhasil ditambahkan');
    }

    public function show(Comic $comic)
    {
        return view('admin.comics.show', compact('comic'));
    }

    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $comic->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Jika upload cover baru
        if ($request->hasFile('cover_image')) {

            // Hapus cover lama
            if ($comic->cover_image) {
                Storage::disk('public')->delete($comic->cover_image);
            }

            $path = $request->file('cover_image')->store('covers', 'public');
            $comic->cover_image = $path;
            $comic->save();
        }

        return redirect()->route('admin.comics.index')
            ->with('success', 'Komik berhasil diupdate');
    }

    public function destroy(Comic $comic)
    {
        if ($comic->cover_image) {
            Storage::disk('public')->delete($comic->cover_image);
        }

        $comic->delete();

        return redirect()->route('admin.comics.index')
            ->with('success', 'Komik berhasil dihapus');
    }
}
