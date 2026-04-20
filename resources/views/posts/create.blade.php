<x-default-layout>
    <x-slot:title>
        Créer une publication
    </x-slot>

    <div class="mt-8 space-y-6">
        <x-post-create :categories="$categories" />
    </div>
</x-default-layout>
