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
        Schema::create('customer_stores', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained('customers')->onDelete('CASCADE');
            $table->foreignId('store_id')->constrained('show_rooms')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_store');
    }
};
