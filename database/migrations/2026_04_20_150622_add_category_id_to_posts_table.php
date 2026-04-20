<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Ajout de la clé étrangère category_id
            // constrained() indique que cela fait référence à la table 'categories'
            // cascadeOnDelete() supprime les posts si la catégorie est supprimée
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // En cas de rollback, on retire la contrainte de clé étrangère puis la colonne
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
