<x-default-layout>
    <x-slot:title>
        Acces refuse
    </x-slot>

    <x-slot:description>
        Vous n'avez pas les droits pour acceder a cette page.
    </x-slot>

    <div class="flex flex-col items-center justify-center py-16">
        <h1 class="text-6xl font-extrabold text-teal-600 dark:text-purple-500 mb-4">403</h1>
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Acces refuse</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 text-center">Desole, vous n'avez pas les permissions necessaires pour voir ce contenu.</p>
        <a href="{{ url('/') }}" class="px-6 py-3 bg-teal-600 dark:bg-purple-900 text-white font-semibold rounded-lg hover:bg-teal-700 dark:hover:bg-purple-800 transition">
            Retour a l'accueil
        </a>
    </div>
</x-default-layout>
