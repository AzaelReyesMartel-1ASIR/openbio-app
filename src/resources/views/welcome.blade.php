<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'OpenBio') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 min-h-screen flex items-center justify-center py-12 px-4">

    <div class="w-full max-w-md bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl overflow-hidden border border-white/50 ring-1 ring-black/5">

        <div class="pt-10 pb-8 text-center px-8">
            <div class="relative inline-block group">
                @if(isset($user) && $user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-28 h-28 rounded-full object-cover border-[6px] border-white shadow-lg mx-auto transition-transform duration-500 hover:scale-105">
                @else
                    <div class="w-28 h-28 rounded-full bg-gradient-to-tr from-gray-100 to-gray-200 flex items-center justify-center mx-auto border-[6px] border-white shadow-lg">
                        <i class="fa-solid fa-user text-5xl text-gray-300"></i>
                    </div>
                @endif

                <div class="absolute bottom-2 right-2 bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-sm" title="Verificado">
                    <i class="fa-solid fa-check text-xs font-bold"></i>
                </div>
            </div>

            <h1 class="mt-6 text-3xl font-extrabold text-gray-800 tracking-tight">{{ $user->name ?? 'Usuario' }}</h1>
            <p class="text-gray-500 font-medium mt-1 text-base">{{ $user->email ?? '' }}</p>
        </div>

        <div class="px-8 pb-10 space-y-4">
            @if(isset($user))
                @forelse($user->links as $link)
                    <a href="{{ route('links.visit', $link) }}" target="_blank"
                       class="group block w-full bg-white hover:bg-white border-2 border-gray-100 hover:border-indigo-200 rounded-2xl p-4 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 relative overflow-hidden">

                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <div class="relative flex items-center justify-between pl-1">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-500 group-hover:bg-indigo-500 group-hover:text-white transition-colors duration-300">
                                    <i class="{{ $link->icon ?? 'fa-solid fa-link' }} text-xl"></i>
                                </div>
                                <span class="font-bold text-gray-700 text-lg group-hover:text-indigo-700 transition-colors">{{ $link->title }}</span>
                            </div>

                            <div class="text-gray-300 group-hover:text-indigo-400 group-hover:translate-x-1 transition-all duration-300">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                        <i class="fa-regular fa-face-smile-wink text-3xl text-gray-300 mb-2"></i>
                        <p class="text-gray-400 font-medium">Aún no hay enlaces públicos</p>
                    </div>
                @endforelse
            @endif
        </div>

        <div class="bg-gray-50/50 px-6 py-6 border-t border-gray-100 text-center backdrop-blur-sm">
            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-200 rounded-full text-sm font-semibold text-gray-600 shadow-sm hover:bg-gray-50 transition">
                    <i class="fa-solid fa-pen-to-square mr-2"></i> Editar Perfil
                </a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-400 hover:text-indigo-500 transition">
                    Admin Login
                </a>
            @endauth
        </div>
    </div>
</body>
</html>
