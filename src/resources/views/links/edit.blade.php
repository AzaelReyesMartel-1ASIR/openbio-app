<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Enlace') }}
        </h2>
    </x-slot>

    <div class="py-6 sm:py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('links.update', $link) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Título del Botón
                            </label>
                            <input type="text" name="title" id="title"
                                value="{{ old('title', $link->title) }}"
                                class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition"
                                placeholder="Ej: Mi Instagram" required>
                        </div>

                        <div class="mb-5">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="url">
                                URL Destino
                            </label>
                            <input type="url" name="url" id="url"
                                value="{{ old('url', $link->url) }}"
                                class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition"
                                placeholder="https://..." required>
                        </div>

                        <div class="mb-8">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="icon">
                                Icono (FontAwesome)
                            </label>
                            <div class="flex gap-3">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                        <i class="fa-solid fa-icons"></i>
                                    </div>
                                    <input type="text" name="icon" id="icon"
                                        value="{{ old('icon', $link->icon) }}"
                                        class="w-full pl-10 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm transition"
                                        placeholder="fa-brands fa-instagram">
                                </div>
                                <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-gray-100 rounded-lg border border-gray-200 text-gray-600 text-xl">
                                    <i class="{{ $link->icon ?? 'fa-solid fa-link' }}"></i>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">
                                Encuentra iconos en <a href="https://fontawesome.com/search?o=r&m=free" target="_blank" class="text-blue-500 hover:underline">FontAwesome.com</a>
                            </p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 font-medium px-4 py-2 rounded-md hover:bg-gray-100 transition">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition transform active:scale-95">
                                Actualizar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
