<x-default-layout>
    <x-slot:title>
        Post de {{ $post->user->username }}
    </x-slot>
    <x-slot:description>
        Affichage détaillé du post.
    </x-slot>
    <div class="mt-8 space-y-6">
        <x-post-card :post="$post" />
    </div>
</x-default-layout>
