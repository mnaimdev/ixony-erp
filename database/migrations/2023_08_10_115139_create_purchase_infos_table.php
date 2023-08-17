<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_infos', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->nullable();
            $table->text('details')->nullable();
            $table->string('purchase_from')->nullable();
            $table->string('supplier_challan_no')->nullable();
            $table->string('bundle_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_infos');
    }
};
