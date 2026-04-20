<article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
    <header class="mb-4">
        <div class="flex items-center gap-3 mb-3">
            <a href="{{ route('users.show', $post->user->username) }}">
                <div
                    class="h-10 w-10 rounded-full bg-teal-600 dark:bg-purple-900 flex items-center justify-center text-white font-semibold hover:bg-teal-700 dark:hover:bg-purple-800">
                    {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
                </div>
            </a>
            <div>
                <a href="{{ route('users.show', $post->user->username) }}" class="hover:underline">
                    <p class="font-semibold text-gray-900 dark:text-white">
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    </p>
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @if ($post->title)
            <a href="{{ route('posts.show', $post->id) }}">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                    {{ $post->title }}
                </h2>
            </a>
        @endif

        <!-- Affichage de la catégorie en texte brut -->
        <p class="text-sm text-gray-500 dark:text-gray-400 font-semibold mb-2">
            Catégorie : {{ $post->category->name }}
        </p>
    </header>

<div class="mb-6">
    <a href="{{ route('posts.show', $post->id) }}">
        <p class="text-gray-700 dark:text-gray-300">
            {{ $post->content }}
        </p>
    </a>
    
    <!-- Si une chaîne FEN est présente, on affiche l'image de l'échiquier -->
    @if ($post->fen_string)
        {{-- Utilisation de l'API Lichess pour plus de fiabilité et de résilience --}}
        <img src="https://lichess1.org/export/fen.gif?fen={{ urlencode($post->fen_string) }}" 
             alt="Position d'échecs" 
             class="mx-auto rounded-lg shadow-sm mt-4 mb-4 max-w-sm w-full">
    @endif
</div>

<footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
        <div class="flex items-center gap-2">
            @auth
            @php $userLike = $post->likes->where('user_id', Auth::id())->first(); @endphp
            @if ($userLike)
            <form action="{{ route('posts.likes.destroy', ['post' => $post->id, 'like' => $userLike->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-3 px-6 py-3 bg-teal-50 dark:bg-purple-900/40 border-2 border-teal-500 dark:border-purple-500 text-teal-700 dark:text-purple-300 font-bold text-sm rounded-full hover:bg-teal-100 dark:hover:bg-purple-900/60 transition cursor-pointer">
                    ♥ {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
                </button>
            </form>
            @else
            <form action="{{ route('posts.likes.store', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center gap-3 px-6 py-3 bg-teal-50 dark:bg-purple-900/40 border-2 border-teal-500 dark:border-purple-500 text-teal-700 dark:text-purple-300 font-bold text-sm rounded-full hover:bg-teal-100 dark:hover:bg-purple-900/60 transition cursor-pointer">
                    ♥ {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
                </button>
            </form>
            @endif

            <!-- Formulaire de favoris -->
            @if (Auth::user()->favorites->contains($post->id))
            <form action="{{ route('favorites.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-3 px-6 py-3 bg-yellow-50 dark:bg-yellow-900/40 border-2 border-yellow-500 text-yellow-700 dark:text-yellow-400 font-bold text-sm rounded-full hover:bg-yellow-100 dark:hover:bg-yellow-900/60 transition cursor-pointer">
                    ★ Retirer des favoris
                </button>
            </form>
            @else
            <form action="{{ route('favorites.store', $post->id) }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center gap-3 px-6 py-3 bg-gray-50 dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 font-bold text-sm rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition cursor-pointer">
                    ☆ Sauvegarder l'étude
                </button>
            </form>
            @endif

            @else
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-teal-50 dark:bg-purple-900/40 border-2 border-teal-500 dark:border-purple-500 text-teal-700 dark:text-purple-300 font-bold text-sm rounded-full">
                ♥ {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </div>
            @endauth
        </div>
        <a href="{{ route('posts.show', $post->id) }}"
            class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800">
            {{ __('ui.posts.view_post') }}
        </a>
    </div>
</footer>
</article>
