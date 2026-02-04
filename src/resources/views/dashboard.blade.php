<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Enlaces') }}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-8 p-6 bg-gray-50 rounded-lg border border-gray-200 flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover border-2 border-blue-500">
                            @else
                                <div class="w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif

                            <div>
                                <h2 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-start gap-2">
                            @csrf
                            @method('PATCH')

                            <label class="cursor-pointer bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-100 transition text-sm font-medium shadow-sm">
                                <i class="fa-solid fa-camera mr-2"></i> Cambiar Foto
                                <input type="file" name="avatar" class="hidden" onchange="this.form.submit()">
                            </label>

                            @error('avatar')
                                <p class="text-red-500 text-xs font-bold mt-1">
                                    <i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $message }}
                                </p>
                            @enderror
                        </form>
                    </div>
                    <hr class="mb-6 border-gray-200">
                    @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-lg text-gray-700">Lista de Links</h3>
                        <a href="{{ route('links.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition shadow-sm text-sm font-bold flex items-center">
                            <i class="fa-solid fa-plus mr-2"></i> <span class="hidden sm:inline">Nuevo Enlace</span><span class="sm:hidden">Nuevo</span>
                        </a>
                    </div>

                    <div class="overflow-x-auto -mx-6 sm:mx-0">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase w-12">Icono</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                                    <th class="hidden md:table-cell px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">URL Destino</th>
                                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Visitas</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($links as $link)
                                <tr class="hover:bg-gray-50 transition group">
                                    <td class="px-4 py-4 text-center text-xl text-gray-600">
                                        <i class="{{ $link->icon ?? 'fa-solid fa-link' }}"></i>
                                    </td>

                                    <td class="px-4 py-4 font-bold text-gray-800 align-middle">
                                        <div class="flex flex-col">
                                            <span>{{ $link->title }}</span>
                                            <a href="{{ $link->url }}" target="_blank" class="md:hidden text-xs text-blue-500 font-normal mt-1 truncate max-w-[150px]">
                                                {{ $link->url }}
                                            </a>
                                        </div>
                                    </td>

                                    <td class="hidden md:table-cell px-4 py-4 text-blue-500 text-sm truncate max-w-xs align-middle">
                                        <a href="{{ $link->url }}" target="_blank" class="hover:underline">
                                            {{ $link->url }}
                                        </a>
                                    </td>

                                    <td class="hidden md:table-cell px-4 py-4 text-blue-500 text-sm truncate max-w-xs align-middle">
                                    </td>

                                    <td class="px-4 py-4 text-center whitespace-nowrap align-middle">
                                        <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fa-solid fa-eye mr-1"></i> {{ $link->clicks }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-right whitespace-nowrap text-sm align-middle">
                                        <a href="{{ route('links.edit', $link) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-50 text-indigo-600 hover:bg-indigo-100 hover:text-indigo-900 mr-2 transition">
                                            <i class="fa-solid fa-pen text-xs"></i>
                                        </a>

                                        <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Borrar este enlace?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-900 transition">
                                                <i class="fa-solid fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-10 text-gray-500">
                                        <p>No tienes enlaces creados.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
