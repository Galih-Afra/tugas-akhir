<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Novel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($comics as $comic)
                    <a href="{{ route('comic.show', $comic) }}" class="block bg-white shadow-lg rounded-lg overflow-hidden transition duration-300 hover:shadow-xl hover:scale-[1.02]">
                        <img class="w-full h-64 object-cover" src="{{ $comic->cover_image ?? '/images/default_cover.png' }}" alt="{{ $comic->title }}">
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900 truncate">{{ $comic->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($comic->description, 40) }}</p>
                            <span class="text-xs text-indigo-500 font-semibold mt-2 block">Baca Sekarang</span>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-gray-500">Belum ada novel yang tersedia saat ini.</p>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $comics->links() }}
            </div>
        </div>
    </div>
</x-app-layout>