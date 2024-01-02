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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('type_id')->constrained('offers_type')->onDelete('cascade')->onDelete('cascade');
            $table->text('product_types');
            $table->tinyInteger('status')->default(1);
            $table->string('requirments')->nullable();
            $table->string('remarks')->nullable();
            $table->string('applied_on')->nullable();
            $table->string('not_applied_on')->nullable();
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
        Schema::dropIfExists('offers');
    }
};
