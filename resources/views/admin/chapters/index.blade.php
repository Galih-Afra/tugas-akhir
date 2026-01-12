<x-app-layout>
    <x-slot name="header">
        📚 Chapter - {{ $comic->title }}
    </x-slot>

    <div class="p-6 space-y-6">

        <!-- Tombol Tambah Chapter -->
        <a href="{{ route('admin.comics.chapters.create', $comic) }}"
           class="bg-indigo-600 text-black px-4 py-2 rounded">
            + Tambah Chapter
        </a>

        <!-- Daftar Chapter -->
        @forelse($chapters as $chapter)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-bold">
                    Chapter {{ $chapter->chapter_number }} - {{ $chapter->title }}
                </h2>

                <!-- Form Upload Pages -->
                <form action="{{ route('admin.comics.chapters.pages.upload', [$comic, $chapter]) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="mt-3 space-y-2">
                    @csrf

                    <input type="file" name="pages[]" multiple required>

                    <button class="bg-green-600 text-black px-3 py-1 rounded">
                        Upload Pages
                    </button>
                </form>

                <!-- Tombol Hapus Chapter (optional) -->
                <form action="{{ route('admin.comics.chapters.destroy', [$comic, $chapter]) }}"
                      method="POST"
                      class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-3 py-1 rounded"
                            onclick="return confirm('Yakin ingin menghapus chapter ini?')">
                        Hapus Chapter
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-500">Belum ada chapter.</p>
        @endforelse

    </div>
</x-app-layout>
