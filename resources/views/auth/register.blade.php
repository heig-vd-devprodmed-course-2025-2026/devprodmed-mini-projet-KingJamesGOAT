<x-default-layout title="{{ __('ui.register') }}">
    <div class="max-w-md mx-auto mt-10 p-6 bg-white dark:bg-slate-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ __('ui.register') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.username') }}</label>
                <input id="username" type="text" name="username" value="{{ old('username') }}" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- First Name -->
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.first_name') }}</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('first_name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.last_name') }}</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('last_name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.password') }}</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('ui.password_confirmation') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-slate-900 shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm">
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 active:bg-teal-900 focus:outline-none focus:border-teal-900 focus:ring ring-teal-300 disabled:opacity-25 transition ease-in-out duration-150">
                    {{ __('ui.register') }}
                </button>
            </div>
        </form>
    </div>
</x-default-layout>
