<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-2">{{ $comic->title }}</h1>
        <p class="text-gray-600 mb-6">{{ $comic->description }}</p>

        <h2 class="font-semibold mb-2">Daftar Chapter</h2>

        <div class="space-y-2">
            @foreach($comic->chapters as $chapter)
                <a href="{{ route('chapter.read', $chapter) }}"
                   class="block p-3 bg-white rounded shadow hover:bg-gray-50">
                    Chapter {{ $chapter->chapter_number }} - {{ $chapter->title }}
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
