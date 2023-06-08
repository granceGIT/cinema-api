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
        Schema::create('showings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('base_price');

            $table->foreignId('hall_id')->constrained('halls')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('film_id')->constrained('films')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showings');
    }
};
