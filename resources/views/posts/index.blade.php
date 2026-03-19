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
        <x-post-create />
    @endcan

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-default-layout>
