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
        Schema::create('desenvolvedores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nivel_id')->constrained('niveis')->cascadeOnDelete();
            $table->string('nome', 100);
            $table->ENUM('sexo', ['M', 'F']);
            $table->date('data_nascimento');
            $table->string('hobby', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desenvolvedores');
    }
};
