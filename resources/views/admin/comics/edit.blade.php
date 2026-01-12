<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Novel
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.comics.update', $comic) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="space-y-6">

                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Komik</label>
                        <input type="text" name="title"
                            value="{{ old('title', $comic->title) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" rows="5"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $comic->description) }}</textarea>
                    </div>

                    {{-- Cover --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cover Komik</label>

                        @if($comic->cover_image)
                            <img src="{{ $comic->cover_image }}"
                                 class="w-40 h-56 object-cover rounded shadow mb-3">
                        @endif

                        <input type="file" name="cover_image"
                            class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded file:border-0
                            file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700
                            hover:file:bg-indigo-100">
                    </div>

                    {{-- Tombol --}}
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('admin.comics.index') }}"
                            class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                            Batal
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-black rounded hover:bg-indigo-700">
                            💾 Update Novel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
