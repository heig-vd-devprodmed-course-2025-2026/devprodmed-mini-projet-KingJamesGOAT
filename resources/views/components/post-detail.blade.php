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
        <div class="flex items-center text-gray-600 dark:text-gray-400">
            <span class="font-bold text-lg">
                {{ trans_choice('ui.posts.likes_count', count($post->likes)) }}
            </span>
        </div>
    </footer>
</article>
