<x-default-layout>
    <x-slot:title>
        {{ __('ui.profile.title', ['username' => $user->username]) }}
    </x-slot>

    <x-slot:description>
        {{ __('ui.profile.description', ['username' => $user->username]) }}
    </x-slot>

    <x-profile-header :user="$user" :posts="$posts" />

    @auth
        @if(Auth::id() === $user->id)
            <div class="mt-4 flex justify-end">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 shadow-sm transition">
                        {{ __('ui.logout') }}
                    </button>
                </form>
            </div>
        @endif
    @endauth

    <div class="mt-8 space-y-6">
        @foreach ($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
</x-default-layout>
