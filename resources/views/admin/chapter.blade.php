<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            ➕ Tambah Chapter - {{ $comic->title }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('admin.chapters.store', $comic) }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Judul Chapter</label>
                    <input name="title" class="w-full border rounded p-2">
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Nomor Chapter</label>
                    <input name="chapter_number" type="number" class="w-full border rounded p-2">
                </div>

                <button class="bg-indigo-600 text-black px-4 py-2 rounded">
                    Simpan Chapter
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
