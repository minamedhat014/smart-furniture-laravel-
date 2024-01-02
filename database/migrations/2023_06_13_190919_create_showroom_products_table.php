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
        Schema::create('showroom_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showRoom_id')->constrained('show_rooms')->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->string('special_offer')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showroom_products');
    }
};
