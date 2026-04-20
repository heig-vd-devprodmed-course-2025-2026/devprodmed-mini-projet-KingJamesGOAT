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
</div>

<footer class="pt-4 border-t border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
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
        @else
        <div class="inline-flex items-center gap-3 px-6 py-3 bg-teal-50 dark:bg-purple-900/40 border-2 border-teal-500 dark:border-purple-500 text-teal-700 dark:text-purple-300 font-bold text-sm rounded-full">
            ♥ {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
        </div>
        @endauth
        <a href="{{ route('posts.show', $post->id) }}"
            class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800">
            {{ __('ui.posts.view_post') }}
        </a>
    </div>
</footer>
</article>
