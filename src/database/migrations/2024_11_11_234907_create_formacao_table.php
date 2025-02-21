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
        Schema::create('formacao', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->string('title');
            $table->string('categoryName');
            $table->string('icon');
            $table->string('formattedDate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacao');
    }
};
