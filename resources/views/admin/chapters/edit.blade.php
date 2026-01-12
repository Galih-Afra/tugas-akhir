<x-app-layout>
    <x-slot name="header">
        ✏️ Edit Chapter - {{ $comic->title }}
    </x-slot>

    <div class="p-6 max-w-xl mx-auto">
        <form action="{{ route('admin.comics.chapters.update', [$comic, $chapter]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Judul Chapter</label>
                <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $chapter->title) }}" required>
            </div>

            <div>
                <label>Nomor Chapter</label>
                <input type="number" name="chapter_number" class="w-full border rounded p-2" value="{{ old('chapter_number', $chapter->chapter_number) }}" required>
            </div>

            <div>
                <label>Isi Chapter</label>
                <textarea name="content" class="w-full border rounded p-2" rows="10" required>{{ old('content', $chapter->content) }}</textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-black px-4 py-2 rounded">
                Update Chapter
            </button>
        </form>
    </div>
</x-app-layout>
