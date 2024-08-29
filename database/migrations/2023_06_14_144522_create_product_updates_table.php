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
        Schema::create('product_updates', function (Blueprint $table) {
            $table->id();
            $table->string('version_summary');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('reason_id')->constrained('version_reason')->onDelete('cascade')->onDelete('cascade');
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('version_controls');
    }
};
