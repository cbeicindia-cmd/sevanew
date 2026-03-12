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
            $table->string('mobile')->nullable()->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['super_admin', 'admin', 'agent', 'citizen'])->default('citizen');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('aadhar_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->text('address')->nullable();
            $table->string('education')->nullable();
            $table->decimal('annual_income', 12, 2)->nullable();
            $table->string('category')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
