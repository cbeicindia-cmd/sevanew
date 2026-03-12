<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->enum('role', ['super_admin', 'admin', 'agent', 'citizen'])->default('citizen');
            $table->timestamps();
        });

        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('mobile_number');
            $table->string('aadhar_number');
            $table->string('pan_number');
            $table->string('state');
            $table->string('district');
            $table->text('address');
            $table->string('education')->nullable();
            $table->string('documents_path')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });

        Schema::create('citizen_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('state');
            $table->string('district');
            $table->decimal('annual_income', 12, 2)->default(0);
            $table->string('category')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citizen_profiles');
        Schema::dropIfExists('agent_profiles');
        Schema::dropIfExists('users');
    }
};
