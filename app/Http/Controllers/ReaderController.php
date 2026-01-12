<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar komik terbaru/populer.
     */
    public function index()
    {
        $comics = Comic::latest()->paginate(12); // Tampilkan 12 komik terbaru
        return view('reader.home', compact('comics'));
    }
    
    /**
     * Menampilkan halaman detail komik dan daftar chapter.
     */
    public function showComic(Comic $comic)
    {
        // Ambil semua chapter, urut descending
        $chapters = $comic->chapters()->orderBy('chapter_number', 'desc')->get();
        return view('reader.comic_detail', compact('comic', 'chapters'));
    }

    /**
     * Menampilkan halaman pembaca (reader) untuk chapter tertentu.
     */
    public function readChapter(Chapter $chapter)
    {
        $comic = $chapter->comic;

        // Ambil konten teks chapter
        // Pastikan di database ada kolom 'content' di tabel 'chapters'
        $content = $chapter->content;

        // Opsional: navigasi next/prev chapter
        $nextChapter = Chapter::where('comic_id', $chapter->comic_id)
                              ->where('chapter_number', '>', $chapter->chapter_number)
                              ->orderBy('chapter_number', 'asc')
                              ->first();

        $prevChapter = Chapter::where('comic_id', $chapter->comic_id)
                              ->where('chapter_number', '<', $chapter->chapter_number)
                              ->orderBy('chapter_number', 'desc')
                              ->first();

        return view('reader.read_chapter', compact(
            'comic', 
            'chapter', 
            'content', 
            'nextChapter', 
            'prevChapter'
        ));
    }
}
