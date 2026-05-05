<x-default-layout>
    <x-slot:title>
        {{ __('ui.home.title') }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.home.description') }}
    </x-slot>

    <h1 class="text-3xl font-extrabold text-center dark:text-white">
        {{ config('app.name') }}
    </h1>

    <p class="mt-6 mb-20 text-center text-lg dark:text-gray-300">
        {{ __('ui.home.introduction', ['app_name' => config('app.name')]) }}
    </p>

    @can('create', App\Models\Post::class)
        <x-post-create :categories="$categories" />
    @endcan

    <div class="mb-6 bg-white p-4 rounded-lg shadow-sm border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('posts.index') }}" method="GET" class="flex items-center gap-4">
            <label for="category_id" class="font-medium text-gray-700 dark:text-gray-300">Filtrer par thème :</label>
            <select name="category_id" id="category_id" class="border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="">Toutes les études</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
                Filtrer
            </button>
            
            @if(request('category_id'))
                <a href="{{ route('posts.index') }}" class="text-sm text-gray-500 hover:text-red-500 underline ml-2 dark:text-gray-400 dark:hover:text-red-400">
                    Enlever le filtre
                </a>
            @endif
        </form>
    </div>

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-default-layout>
