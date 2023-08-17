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
        Schema::create('challan_return_infos', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('created_by')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('delivery_location')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('work_order_no')->nullable();
            $table->string('bundle_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challan_return_infos');
    }
};
