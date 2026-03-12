<article class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-8">
    <header class="mb-6">
        <div class="flex items-center gap-4 mb-4">
            <a href="{{ url('@' . $post->user->username) }}">
                <div
                    class="h-12 w-12 rounded-full bg-teal-600 dark:bg-purple-900 flex items-center justify-center text-white font-bold text-lg hover:bg-teal-700 dark:hover:bg-purple-800">
                    {{ strtoupper(substr($post->user->first_name, 0, 1) . substr($post->user->last_name, 0, 1)) }}
                </div>
            </a>
            <div>
                <a href="{{ url('@' . $post->user->username) }}" class="hover:underline">
                    <p class="font-bold text-gray-900 dark:text-white text-lg">
                        {{ $post->user->first_name }} {{ $post->user->last_name }}
                    </p>
                </a>
                <p class="text-gray-500 dark:text-gray-400" title="{{ $post->created_at->isoFormat('LLLL') }}">
                    {{ $post->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
        @if ($post->title)
            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">
                {{ $post->title }}
            </h1>
        @endif
    </header>

    <div class="mb-6">
        <p class="text-gray-800 dark:text-gray-200 text-lg leading-relaxed">
            {{ $post->content }}
        </p>
    </div>

    <footer class="pt-6 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between text-gray-600 dark:text-gray-400">
            <form action="{{ url('/posts/' . $post->id . '/like') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center gap-3 px-8 py-4 bg-teal-50 dark:bg-purple-900/40 border-2 border-teal-500 dark:border-purple-500 text-teal-700 dark:text-purple-300 font-bold text-xl rounded-full hover:bg-teal-100 dark:hover:bg-purple-900/60 transition cursor-pointer">
                    ♥ {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
                </button>
            </form>
            <div class="flex gap-3">
                <a href="{{ url('/posts/' . $post->id . '/edit') }}" 
                   class="px-4 py-2 bg-blue-600 dark:bg-blue-800 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    Modifier
                </a>
                <form action="{{ url('/posts/' . $post->id) }}" method="POST" onsubmit="return confirm('Voulez vous vraiment supprimer cette publication ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 dark:bg-red-900 text-white font-semibold rounded-md hover:bg-red-700 transition">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </footer>
</article>
