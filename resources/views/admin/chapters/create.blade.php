<x-app-layout>
    <x-slot name="header">
        ➕ Tambah Chapter - {{ $comic->title }}
    </x-slot>

    <div class="p-6 max-w-xl mx-auto">
        <form action="{{ route('admin.comics.chapters.store', $comic) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label>Judul Chapter</label>
                <input type="text" name="title" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Nomor Chapter</label>
                <input type="number" name="chapter_number" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label>Isi Chapter</label>
                <textarea name="content" class="w-full border rounded p-2" rows="10" required></textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-black px-4 py-2 rounded">
                Simpan Chapter
            </button>
        </form>
    </div>
</x-app-layout>
