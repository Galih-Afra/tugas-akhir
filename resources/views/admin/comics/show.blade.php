<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📖 Detail Komik
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

            {{-- Cover --}}
            @if($comic->cover)
                <img src="{{ asset('storage/' . $comic->cover) }}"
                     class="w-60 h-80 object-cover rounded shadow mb-6">
            @else
                <div class="w-60 h-80 bg-gray-200 flex items-center justify-center rounded mb-6">
                    Tidak ada cover
                </div>
            @endif

            {{-- Judul --}}
            <h1 class="text-2xl font-bold mb-2">
                {{ $comic->title }}
            </h1>

            {{-- Deskripsi --}}
            <p class="text-gray-600 mb-6">
                {{ $comic->description ?? 'Tidak ada deskripsi.' }}
            </p>

            {{-- Tombol --}}
            <div class="flex gap-4">
                <a href="{{ route('admin.comics.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    ← Kembali
                </a>

                <a href="{{ route('admin.comics.chapters.index', $comic) }}"
                   class="px-4 py-2 bg-indigo-600 text-black rounded hover:bg-indigo-700">
                    📚 Kelola Chapter
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
