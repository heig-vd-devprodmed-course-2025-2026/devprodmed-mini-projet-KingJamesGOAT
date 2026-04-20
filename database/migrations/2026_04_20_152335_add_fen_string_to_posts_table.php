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
            // Ajout de la colonne fen_string après la colonne content
            // Elle est nullable car optionnelle
            $table->string('fen_string')->nullable()->after('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Suppression de la colonne en cas d'annulation de la migration
            $table->dropColumn('fen_string');
        });
    }
};
