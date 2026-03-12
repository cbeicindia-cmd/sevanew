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
            $table->string('state');
            $table->string('category');
            $table->string('department');
            $table->longText('description');
            $table->longText('benefits');
            $table->longText('eligibility');
            $table->longText('documents_required');
            $table->longText('application_process');
            $table->string('official_link')->nullable();
            $table->date('last_updated')->nullable();
            $table->timestamps();
            $table->index(['state', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schemes');
    }
};
