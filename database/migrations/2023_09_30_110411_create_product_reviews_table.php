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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onDelete('cascade');
            $table->tinyInteger('price_scale');
            $table->string('price_recomendation')->nullable();
            $table->tinyInteger('material_scale')->nullable();
            $table->string('material_recomendation')->nullable();
            $table->tinyInteger('colors_scale')->nullable();
            $table->string('colors_recomendation')->nullable();
            $table->tinyInteger('design_scale')->nullable();
            $table->string('design_recomendation')->nullable();
            $table->tinyInteger('general_scale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviws');
    }
};
