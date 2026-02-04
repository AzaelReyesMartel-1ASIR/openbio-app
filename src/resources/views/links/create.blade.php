<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Enlace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('links.store') }}" method="POST">
                    @csrf <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Título del Botón</label>
                        <input type="text" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ej: Mi Instagram" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">URL Destino</label>
                        <input type="url" name="url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="https://instagram.com/..." required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Icono (Clase FontAwesome)</label>
                        <input type="text" name="icon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ej: fa-brands fa-instagram">
                        <p class="text-xs text-gray-500 mt-1">Busca iconos en FontAwesome.com</p>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar Enlace
                    </button>
                    <a href="{{ route('dashboard') }}" class="text-gray-500 ml-4">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
