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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('branch_id')->constrained('show_rooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('status_id')->constrained('order_statuses')->nullable()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('sales_name')->nullable();
            $table->foreignId('delivery_address_id')->constrained('customer_addresses');
            $table->string('remarks')->nullable();
            $table->string('order_type')->nullable();
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
        Schema::dropIfExists('customer_orders');
    }
};
