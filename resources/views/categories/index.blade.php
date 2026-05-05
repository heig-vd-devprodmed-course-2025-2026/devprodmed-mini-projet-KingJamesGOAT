<x-default-layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Toutes les catégories d'étude</h1>
        <div class="grid grid-cols-2 gap-4">
            @foreach($categories as $category)
                <div class="bg-white p-6 rounded-lg shadow-sm border">
                    <h2 class="text-xl font-semibold text-blue-600">{{ $category->name }}</h2>
                    <p class="text-gray-500 mt-2">{{ $category->posts_count }} publications dans cette catégorie.</p>
                </div>
            @endforeach
        </div>
    </div>
</x-default-layout>
