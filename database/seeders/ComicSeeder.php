<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comic; // ← WAJIB ADA INI

class ComicSeeder extends Seeder
{
    public function run(): void
    {
        Comic::insert([
            [
                'title' => 'Langit Terakhir',
                'description' => 'Seorang siswa menemukan buku yang bisa melihat takdir...',
                'genre' => 'Drama, Slice of Life',
                'author' => 'Raka Pratama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pedang di Balik Senja',
                'description' => 'Pemuda menemukan pedang terkutuk di dunia runtuh...',
                'genre' => 'Action, Fantasy',
                'author' => 'Kirana Aulia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kos 13B',
                'description' => 'Kamar kos dengan aturan aneh setelah tengah malam...',
                'genre' => 'Horror, Mystery',
                'author' => 'Dimas Wicaksono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Reset: 24 Jam Terakhir',
                'description' => 'Pemuda terjebak dalam time loop misterius...',
                'genre' => 'Sci-Fi, Thriller',
                'author' => 'Naya Putri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kopi di Ujung Musim Hujan',
                'description' => 'Dua orang asing bertemu rutin di kedai kopi...',
                'genre' => 'Romance, Drama',
                'author' => 'Ilham Daryanto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
