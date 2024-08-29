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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->foreignId('type_id')->constrained('product_types')->cascadeOnUpdate();
            $table->foreignId('source_id')-> constrained('product_sources')->cascadeOnUpdate();
            $table->string('descripation');
            $table->integer('warranty_years')->default(0);
            $table->string('fabric')->nullable();
            $table->string('sponge')->nullable();
            $table->string('sponge_thickness')->nullable();
            $table->tinyInteger('divisablity')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('Standard_ability')->default(1);
            $table->tinyInteger('chair_added')->nullable()->default(0);
            $table->tinyInteger('coshin_number')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
