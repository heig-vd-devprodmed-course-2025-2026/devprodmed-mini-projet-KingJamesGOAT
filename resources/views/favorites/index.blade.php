<x-default-layout>
    <x-slot:title>
        Mes Études
    </x-slot>

    <h1 class="text-3xl font-extrabold text-center dark:text-white mb-10">
        Mes Études Sauvegardées
    </h1>

    <div class="mt-8 space-y-6">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-8 text-center">
                <p class="text-gray-600 dark:text-gray-400 text-lg">Vous n'avez pas encore sauvegardé d'études.</p>
                <a href="{{ route('posts.index') }}" class="inline-block mt-4 text-teal-600 hover:underline">Découvrir des publications</a>
            </div>
        @endforelse
    </div>
</x-default-layout>
