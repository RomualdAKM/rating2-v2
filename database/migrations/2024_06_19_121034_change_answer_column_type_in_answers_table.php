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
       // Modifier le type de colonne 'answer' de boolean à string
       Schema::table('answers', function (Blueprint $table) {
        // Changer le type de la colonne
        $table->string('answer')->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // Revenir en arrière en changeant le type de colonne 'answer' de string à boolean
       Schema::table('answers', function (Blueprint $table) {
        $table->boolean('answer')->change();
    });
    }
};
