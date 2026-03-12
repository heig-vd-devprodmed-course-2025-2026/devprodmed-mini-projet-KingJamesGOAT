<div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-10 mt-12 mb-12 mx-auto max-w-xl">
    <h2 class="text-2xl font-bold dark:text-white mb-8 text-center">Créer une publication</h2>
    <form action="{{ url('/posts') }}" method="POST" class="space-y-6">
        @csrf
        <div class="max-w-lg mx-auto">
            <input type="text" name="title" placeholder="Titre du post (optionnel)" 
                class="w-full rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-slate-900 dark:text-white px-6 py-4 text-base text-center placeholder-gray-400 dark:placeholder-gray-500 focus:border-teal-500 dark:focus:border-purple-500 focus:ring-0 focus:outline-none transition">
            @error('title')
                <p class="text-red-500 text-sm mt-1 mx-1 text-center">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="max-w-lg mx-auto">
            <textarea name="content" rows="4" placeholder="Quoi de neuf ? Partagez vos pensées..." required 
                class="w-full rounded-lg border-2 border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-slate-900 dark:text-white px-6 py-4 text-base text-center placeholder-gray-400 dark:placeholder-gray-500 focus:border-teal-500 dark:focus:border-purple-500 focus:ring-0 focus:outline-none transition resize-none"></textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1 mx-1 text-center">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-center pt-4">
            <button type="submit" 
                class="px-4 py-2 bg-teal-600 dark:bg-purple-900 text-white rounded-md hover:bg-teal-700 dark:hover:bg-purple-800 transition">
                Publier
            </button>
        </div>
    </form>
</div>