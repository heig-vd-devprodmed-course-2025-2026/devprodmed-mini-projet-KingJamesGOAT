<h1 class="text-2xl font-bold dark:text-white">
    {{ __('ui.profile.title', ['username' => $user->username]) }}
</h1>

<p class="mt-4 dark:text-gray-300">
    {{ trans_choice('ui.profile.number_of_posts', count($posts)) }}
</p>