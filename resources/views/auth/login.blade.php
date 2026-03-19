<x-default-layout title="{{ __('ui.login') }}">
    <div class="max-w-md mx-auto mt-10 p-6 bg-white dark:bg-slate-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ __('ui.login') }}</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="mb-4 block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-teal-600 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('ui.remember_me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 active:bg-teal-900 focus:outline-none focus:border-teal-900 focus:ring ring-teal-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('ui.login') }}
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
