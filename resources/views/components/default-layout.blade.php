<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        @isset($description)
        <meta name="description" content="{{ $description }}" />
        @endisset
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @isset($title)
        <title>{{ $title }} - {{ config('app.name') }}</title>
        @else
        <title>{{ config('app.name') }}</title>
        @endisset
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex min-h-screen flex-col bg-slate-50 dark:bg-slate-900">
        <header class="bg-teal-600 text-white dark:bg-slate-800">
            <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="h-16 flex items-center justify-between">
                    <a href="{{ route('posts.index') }}" class="block hover:opacity-80 transition">
                        {{ config('app.name') }}
                    </a>
                    <div class="flex items-center space-x-4">
                        @auth
                            <div class="flex items-center gap-8">
                                <a
                                    href="{{ route('favorites.index') }}"
                                    class="block hover:text-teal-200 dark:hover:text-purple-300 transition font-bold"
                                >
                                    Mes Études
                                </a>
                                
                                <div class="flex items-center gap-4 border-l pl-6 border-teal-500 dark:border-slate-700">
                                    <a
                                        href="{{ route('users.show', Auth::user()->username) }}"
                                        class="block hover:opacity-80 transition"
                                        title="{{ __('ui.profile.title') }}"
                                    >
                                        <img
                                            src="/icons/profile.svg"
                                            alt="{{ __('ui.profile.title') }}"
                                            class="h-9 w-9 rounded-full inline-block bg-teal-700 p-1"
                                        />
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                                        @csrf
                                        <button type="submit" class="hover:text-teal-200 dark:hover:text-purple-300 font-semibold text-sm transition">{{ __('ui.logout') }}</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold rounded-lg border border-teal-200/30 hover:bg-teal-700 dark:border-slate-600 dark:hover:bg-slate-700 transition">{{ __('ui.login') }}</a>
                                <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-semibold rounded-lg bg-teal-800 hover:bg-teal-900 shadow-sm dark:bg-teal-600 dark:hover:bg-teal-700 transition">{{ __('ui.register') }}</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>

        <main
            class="container mx-auto px-4 py-8 sm:px-6 lg:px-8 flex-grow dark:text-white max-w-2xl"
        >
            @if (session('success'))
                <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </main>

        <footer class="bg-teal-600 text-white text-sm dark:bg-slate-800">
            <div class="container mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div
                    class="h-16 flex flex-col items-center justify-between gap-4 sm:flex-row"
                >
                    <p class="text-center sm:text-left">
                        {{ __('ui.about.copyright', ['year' => date('Y')]) }}
                    </p>
                    <a
                        href="{{ route('about') }}"
                        class="block hover:opacity-80 transition"
                    >
                        {{ __('ui.about.title') }}
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>
