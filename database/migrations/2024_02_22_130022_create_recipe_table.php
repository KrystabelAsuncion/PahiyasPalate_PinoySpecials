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
        Schema::create('recipe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('level_id');
            $table->string('recipe_name');
            $table->string('recipe_description');
            $table->string('recipe_image')->nullable();
            $table->string('link');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('likes')->default(0);
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe');
    }
};
