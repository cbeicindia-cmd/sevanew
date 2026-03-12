<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('citizen_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->decimal('annual_income', 12, 2)->nullable();
            $table->string('category')->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('state');
            $table->string('district');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citizen_profiles');
    }
};
