<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    // Daftar chapter per comic
    public function index(Comic $comic)
    {
        $chapters = $comic->chapters()->orderBy('chapter_number')->get();
        return view('admin.chapters.index', compact('comic', 'chapters'));
    }

    // Form tambah chapter
    public function create(Comic $comic)
    {
        return view('admin.chapters.create', compact('comic'));
    }

    // Simpan chapter
    public function store(Request $request, Comic $comic)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|integer',
            'content' => 'required|string',
        ]);

        $comic->chapters()->create($data);

        return redirect()->route('admin.comics.chapters.index', $comic)
                         ->with('success', 'Chapter berhasil ditambahkan');
    }

    // Form edit chapter
    public function edit(Comic $comic, Chapter $chapter)
    {
        return view('admin.chapters.edit', compact('comic', 'chapter'));
    }

    // Update chapter
    public function update(Request $request, Comic $comic, Chapter $chapter)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'chapter_number' => 'required|integer',
            'content' => 'required|string',
        ]);

        $chapter->update($data);

        return redirect()->route('admin.comics.chapters.index', $comic)
                         ->with('success', 'Chapter berhasil diupdate');
    }

    // Hapus chapter
    public function destroy(Comic $comic, Chapter $chapter)
    {
        foreach ($chapter->pages as $page) {
            if ($page->image_path) {
                Storage::disk('public')->delete($page->image_path);
            }
            $page->delete();
        }

        $chapter->delete();

        return redirect()->route('admin.comics.chapters.index', $comic)
                         ->with('success', 'Chapter dihapus');
    }

    // Upload multiple pages
    public function uploadPages(Request $request, Comic $comic, Chapter $chapter)
    {
        $request->validate([
            'pages.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('pages')) {
            foreach ($request->file('pages') as $file) {
                $path = $file->store('chapters/' . $chapter->id, 'public');
                $chapter->pages()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.comics.chapters.index', $comic)
                         ->with('success', 'Pages berhasil diupload!');
    }
}
