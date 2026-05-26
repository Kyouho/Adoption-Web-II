<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->id();

            // Relaciones
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('animal_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Datos solicitud
            $table->string('housing_type');

            $table->text('experience_with_pets')
                  ->nullable();

            $table->text('motivation');

            $table->enum('status', [
                'pending',
                'in_review',
                'approved',
                'rejected'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};