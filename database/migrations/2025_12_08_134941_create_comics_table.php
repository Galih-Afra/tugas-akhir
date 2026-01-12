<?php

// database/migrations/..._create_comics_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable(); // Path gambar sampul
            $table->timestamps();
        });

        // Tambahkan tabel chapters (bab) untuk setiap komik
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comic_id')->constrained()->onDelete('cascade');
            $table->integer('chapter_number');
            $table->string('title');
            $table->timestamps();
            $table->unique(['comic_id', 'chapter_number']); // Setiap komik punya nomor bab unik
        });

        // Tambahkan tabel pages (halaman) untuk setiap bab
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->integer('page_number');
            $table->string('image_path'); // Path gambar halaman
            $table->timestamps();
            $table->unique(['chapter_id', 'page_number']); // Setiap bab punya nomor halaman unik
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
        Schema::dropIfExists('chapters');
        Schema::dropIfExists('comics');
    }
};