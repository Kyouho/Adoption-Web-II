<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->id();

            $table->string('system_name');

            $table->string('contact_email');

            $table->enum('theme', [
                'light',
                'dark'
            ])->default('light');

            $table->enum('language', [
                'es',
                'en'
            ])->default('es');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};