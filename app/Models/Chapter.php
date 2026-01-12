<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'comic_id',
        'title',
        'chapter_number',
        'content', // pastikan content bisa diisi
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class)->orderBy('page_number');
    }
}
