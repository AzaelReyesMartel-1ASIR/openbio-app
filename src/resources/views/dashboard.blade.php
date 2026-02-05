<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
            <i class="fa-solid fa-layer-group mr-3 text-indigo-600 text-3xl"></i> {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl p-8 border-b-4 border-indigo-500 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-lg font-medium mb-1">Total Enlaces</p>
                            <p class="text-5xl font-extrabold text-gray-800">{{ $links->count() }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-indigo-50 text-indigo-500">
                            <i class="fa-solid fa-link text-4xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-2xl p-8 border-b-4 border-emerald-500 transform hover:scale-105 transition-transform duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-lg font-medium mb-1">Visitas Totales</p>
                            <p class="text-5xl font-extrabold text-gray-800">{{ $links->sum('clicks') }}</p>
                        </div>
                        <div class="p-4 rounded-2xl bg-emerald-50 text-emerald-500">
                            <i class="fa-solid fa-chart-line text-4xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-2xl p-8 border-b-4 border-purple-500 flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-lg font-medium mb-2">Tu Web Pública</p>
                        <a href="{{ url('/') }}" target="_blank" class="inline-flex items-center text-white bg-purple-600 hover:bg-purple-700 font-bold py-2 px-6 rounded-xl text-lg transition shadow-md">
                            Ver Página <i class="fa-solid fa-arrow-up-right-from-square ml-3"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-white shadow-xl rounded-2xl p-8 text-center h-full">
                        <h3 class="text-xl font-bold text-gray-700 mb-6 border-b pb-4">Tu Identidad</h3>

                        <div class="mb-6 relative inline-block group cursor-pointer">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-48 h-48 rounded-full object-cover mx-auto border-8 border-gray-50 shadow-xl">
                            @else
                                <div class="w-48 h-48 rounded-full bg-gray-100 mx-auto flex items-center justify-center text-gray-300 shadow-inner">
                                    <i class="fa-solid fa-camera text-6xl"></i>
                                </div>
                            @endif

                            <label class="absolute inset-0 flex flex-col items-center justify-center bg-black/60 text-white opacity-0 group-hover:opacity-100 rounded-full cursor-pointer transition-all duration-300">
                                <i class="fa-solid fa-cloud-arrow-up text-4xl mb-2"></i>
                                <span class="font-bold text-lg">Cambiar Foto</span>
                                <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" class="hidden">
                                    @csrf
                                    @method('PATCH')
                                    <input type="file" name="avatar" onchange="this.form.submit()">
                                </form>
                            </label>
                        </div>

                        <h2 class="font-bold text-2xl text-gray-800">{{ auth()->user()->name }}</h2>
                        <p class="text-gray-500 text-lg mb-6">{{ auth()->user()->email }}</p>

                        @error('avatar')
                            <div class="bg-red-50 text-red-600 p-3 rounded-lg text-sm font-bold mb-4 animate-pulse">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                        <div class="p-8 bg-white border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-700">Tus Enlaces Activos</h3>
                            <a href="{{ route('links.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl text-base transition flex items-center shadow-lg transform hover:-translate-y-1">
                                <i class="fa-solid fa-plus mr-2"></i> Crear Nuevo
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-8 py-5 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">Info</th>
                                        <th class="px-8 py-5 text-center text-sm font-bold text-gray-500 uppercase tracking-wider">Métricas</th>
                                        <th class="px-8 py-5 text-right text-sm font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @forelse ($links as $link)
                                        <tr class="hover:bg-indigo-50/30 transition duration-150">
                                            <td class="px-8 py-6">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-14 w-14 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl mr-4">
                                                        <i class="{{ $link->icon ?? 'fa-solid fa-link' }}"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-lg font-bold text-gray-900">{{ $link->title }}</div>
                                                        <div class="text-sm text-gray-500 truncate max-w-[200px]">{{ $link->url }}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-8 py-6 text-center whitespace-nowrap">
                                                <div class="inline-flex flex-col items-center justify-center px-4 py-2 rounded-lg bg-emerald-50 border border-emerald-100">
                                                    <span class="text-2xl font-bold text-emerald-600">{{ $link->clicks }}</span>
                                                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-wide">Visitas</span>
                                                </div>
                                            </td>

                                            <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex items-center justify-end space-x-3">
                                                    <a href="{{ route('links.edit', $link) }}" class="text-white bg-blue-500 hover:bg-blue-600 p-3 rounded-lg shadow-sm transition" title="Editar">
                                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                                    </a>

                                                    <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Borrar enlace?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-white bg-red-500 hover:bg-red-600 p-3 rounded-lg shadow-sm transition" title="Borrar">
                                                            <i class="fa-solid fa-trash-can text-lg"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-8 py-16 text-center text-gray-400">
                                                <div class="flex flex-col items-center">
                                                    <i class="fa-regular fa-folder-open text-6xl mb-4 text-gray-200"></i>
                                                    <p class="text-xl font-medium">Está todo muy vacío por aquí...</p>
                                                    <p class="text-sm">¡Crea tu primer enlace arriba!</p>
                                                </div>
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
    </div>
</x-app-layout>
