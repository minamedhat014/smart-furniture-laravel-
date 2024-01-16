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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('set')->default(1);
            $table->string('item_code');
            $table->string('descripation');
            $table->string('component_name');
            $table->string('item_color');
            $table->integer('quantity')->default(1);
            $table->integer('item_hieght');
            $table->integer('item_width');
            $table->integer('item_length');
            $table->integer('item_out_depth');
            $table->integer('item_inner_depth');
            $table->Date('available_date');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('product_details');
    }
};
