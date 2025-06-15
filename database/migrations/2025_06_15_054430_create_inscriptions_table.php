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
    Schema::create('inscriptions', function (Blueprint $table) {
        $table->id();

        // Nom : lettres, espaces, apostrophes — max 100 caractères
        $table->string('nom', 100);

        // Prénom : lettres, espaces, apostrophes, tirets — max 100
        $table->string('prenom', 100);

        // Email unique
        $table->string('email')->unique();

        // Indicatif (ex: +33)
        $table->string('indicatif', 10);

        // Numéro de téléphone : entre 6 et 15 chiffres, on utilise string
        $table->string('telephone', 20);

        // Code postal : ex. 75000
        $table->string('code_postal', 10);

        // Ville : ex. Paris
        $table->string('ville', 100);

        // Pays : France, Belgique, etc.
        $table->string('pays', 100);

        $table->timestamps(); // created_at et updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
