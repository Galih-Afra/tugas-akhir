<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                📚 Manajemen Novel
            </h2>

            <a href="{{ route('admin.comics.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                + Tambah Novel
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
                            <tr>
                                <th class="px-6 py-3 text-left">Cover</th>
                                <th class="px-6 py-3 text-left">Judul</th>
                                <th class="px-6 py-3 text-left">Deskripsi</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse($comics as $comic)
                                <tr class="hover:bg-gray-50 transition">

                                    {{-- Cover --}}
                                    <td class="px-6 py-4">
                                        @if($comic->cover_image)
                                            <img src="{{ $comic->cover_image }}"
                                                 class="w-12 h-16 object-cover rounded shadow">
                                        @else
                                            <div class="w-12 h-16 bg-gray-200 flex items-center justify-center rounded text-xs text-gray-500">
                                                N/A
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Judul --}}
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $comic->title }}
                                    </td>

                                    {{-- Deskripsi --}}
                                    <td class="px-6 py-4 text-gray-600 text-sm">
                                        {{ \Illuminate\Support\Str::limit($comic->description, 60) }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('admin.comics.show', $comic) }}"
                                            class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 text-sm">
                                            Detail
                                        </a>

                                        <a href="{{ route('admin.comics.edit', $comic) }}"
                                            class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.comics.destroy', $comic) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Yakin ingin menghapus?')"
                                                class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 text-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-8 text-gray-500">
                                        Belum ada data komik.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $comics->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
