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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_detail_id')->constrained('product_details')->onDelete('cascade')->onUpdate('cascade');
            $table->double('dealler_price')->default(1);
            $table->double('end_before_discount');
            $table->decimal('normal_discount')->default(0.15);
            $table->decimal('vatt')->default(0.14);
            $table->decimal('dealler_margin');
            $table->decimal('special_discount');
            $table->double('end_after_discount'); 
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
        Schema::dropIfExists('prices');
    }
};
