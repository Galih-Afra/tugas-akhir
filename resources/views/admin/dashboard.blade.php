<x-app-layout>
    <x-slot name="header">
        @if(Auth::check() && Auth::user()->role === 'admin')
            Admin Dashboard
        @else
            Dashboard
        @endif
    </x-slot>

    <div class="p-6">
        @if(Auth::check() && Auth::user()->role === 'admin')
            <h1 class="text-2xl font-bold">Selamat datang Admin 👋</h1>

            <div class="mt-4 space-y-2">
                <a href="{{ route('admin.comics.index') }}" class="text-blue-600 underline">
                    Kelola Komik
                </a>
            </div>
        @else
            <h1 class="text-2xl font-bold">Selamat datang {{ Auth::user()->name }} 👋</h1>

            <div class="mt-4 space-y-2">
                <p>Ini adalah dashboard member biasa.</p>
            </div>
        @endif
    </div>
</x-app-layout>
