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
            $table->string('series')->nullable();
            $table->string('title')->nullable();
            $table->text('details')->nullable();
            $table->string('model')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('origin')->nullable();
            $table->string('country_of_manufacturing')->nullable();
            $table->unsignedBigInteger('base_unit')->nullable();
            $table->unsignedBigInteger('current_price')->nullable();
            $table->unsignedBigInteger('current_stock')->nullable();
            $table->unsignedBigInteger('stock_limit')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
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
