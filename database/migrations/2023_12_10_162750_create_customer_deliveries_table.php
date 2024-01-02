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
        Schema::create('customer_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('customer_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('product_rate')->nullable();
            $table->integer('tech_rate')->nullable();
            $table->integer('branch_rate')->nullable();
            $table->integer('total_rate')->nullable();
            $table->integer('time_comittment')->default(1)->nullable();
            $table->integer('has_complaint')->default(0)->nullable();
            $table->integer('has_return')->default(0)->nullable();
            $table->foreignId('concern_id')->constrained('customer_concern')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('remarks');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_deliveries');
    }
};
