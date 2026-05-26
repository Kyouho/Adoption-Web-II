<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('type');
            $table->string('breed')->nullable();

            $table->integer('age');

            $table->enum('gender', ['male', 'female']);

            $table->string('health_status')->nullable();

            $table->text('vaccines')->nullable();

            $table->text('description')->nullable();

            $table->enum('status', [
                'available',
                'in_process',
                'adopted'
            ])->default('available');

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};