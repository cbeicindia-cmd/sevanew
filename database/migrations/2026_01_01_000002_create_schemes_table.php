<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schemes', function (Blueprint $table) {
            $table->id();
            $table->string('scheme_name');
            $table->string('scheme_code')->unique();
            $table->string('state')->index();
            $table->string('category')->index();
            $table->string('department');
            $table->text('description');
            $table->text('benefits');
            $table->text('eligibility');
            $table->text('documents_required')->nullable();
            $table->text('application_process')->nullable();
            $table->string('official_link')->nullable();
            $table->decimal('max_income', 12, 2)->default(100000000);
            $table->integer('min_age')->default(0);
            $table->enum('gender', ['Any', 'Male', 'Female', 'Other'])->default('Any');
            $table->date('last_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schemes');
    }
};
