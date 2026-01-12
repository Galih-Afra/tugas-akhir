<x-app-layout>
    <x-slot name="header">
        📖 {{ $comic->title }} - Chapter {{ $chapter->chapter_number }}
    </x-slot>

    <div class="p-6 space-y-6 max-w-3xl mx-auto">

        <!-- Judul Chapter -->
        <h2 class="font-bold text-xl">{{ $chapter->title }}</h2>

        <!-- Konten Chapter -->
        <div class="mt-4 prose">
            {!! nl2br(e($chapter->content)) !!}
        </div>

        <!-- Navigasi Chapter -->
        <div class="flex justify-between mt-6">
            @if($prevChapter)
                <a href="{{ route('chapter.read', $prevChapter) }}" class="bg-gray-300 px-4 py-2 rounded">
                    &larr; Previous
                </a>
            @endif

            @if($nextChapter)
                <a href="{{ route('chapter.read', $nextChapter) }}" class="bg-gray-300 px-4 py-2 rounded">
                    Next &rarr;
                </a>
            @endif
        </div>

        <!-- Tombol toggle Daftar Chapter -->
        <button 
            onclick="document.getElementById('chapterList').classList.toggle('hidden')"
            class="mt-6 bg-indigo-600 text-black px-4 py-2 rounded">
            📑 Daftar Chapter
        </button>

        <!-- Daftar Chapter (default hidden) -->
        <div id="chapterList" class="mt-4 hidden">
            <h3 class="font-semibold mb-2">Daftar Chapter</h3>
            <ul class="list-disc list-inside">
                @foreach($comic->chapters as $ch)
                    <li>
                        <a href="{{ route('chapter.read', $ch) }}" class="text-blue-600 hover:underline">
                            Chapter {{ $ch->chapter_number }} - {{ $ch->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</x-app-layout>
