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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path')->nullable();
            $table->string('name');
            $table->string('specie'); // especie
            $table->string('breed')->nullable(); // raça
            $table->string('color')->nullable(); // cor
            $table->decimal('heigth', 12, 3)->nullable(); // altura
            $table->decimal('weight', 12, 3)->nullable(); // peso
            $table->string('gender')->nullable(); // sexo
            $table->date('birth_date')->nullable(); // data de nascimento
            $table->string('father')->nullable(); // nome do pai
            $table->string('mother')->nullable(); // nome da mãe
            $table->text('observations')->nullable(); // observações
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
