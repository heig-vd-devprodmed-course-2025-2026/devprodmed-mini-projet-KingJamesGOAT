<x-default-layout>
    <x-slot:title>
        L'Échiquier Social
    </x-slot>

    <x-slot:description>
        Découvrez L'Échiquier Social, le réseau dédié aux passionnés du noble jeu.
    </x-slot>

    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-10 max-w-3xl mx-auto mt-8">
        <h1 class="text-4xl font-extrabold text-teal-600 dark:text-purple-400 mb-6 text-center">
            ♚ L'Échiquier Social ♚
        </h1>

        <div class="space-y-6 text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
            <p>
                Bienvenue sur <strong>L'Échiquier Social</strong>, la plateforme par excellence dédiée aux joueurs d'échecs de tous niveaux ! ♟️
            </p>
            
            <p>
                Notre mission est simple : offrir un espace où les passionnés du noble jeu peuvent se réunir pour partager leurs tactiques brillantes, étudier des finales complexes et discuter de leurs ouvertures favorites. ♞
            </p>

            <div class="bg-teal-50 dark:bg-slate-700 p-6 rounded-lg border-l-4 border-teal-500 dark:border-purple-500 my-8">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Fonctionnalités clés :</h2>
                <ul class="list-disc list-inside space-y-2">
                    <li>Partagez vos meilleures parties et analyses.</li>
                    <li>Joignez des positions FEN pour afficher des échiquiers interactifs.</li>
                    <li>Sauvegardez les études des autres membres dans vos favoris.</li>
                    <li>Échangez et commentez avec une communauté active.</li>
                </ul>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400 italic text-center mt-12 pt-6 border-t border-gray-200 dark:border-gray-700">
                {{ __('ui.about.disclaimer') }}
            </p>
        </div>
    </div>
</x-default-layout>
