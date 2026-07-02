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
        // Ubah dari 'promo' menjadi 'promos'
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('slug')->unique();
            $table->text('description')->nullable(); 

            $table->string('type')->default('bundle');

            $table->string('bonus_item_name')->nullable(); 
            $table->integer('min_transaction_items')->nullable()->default(1); 
            $table->integer('package_price')->nullable(); 

            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Sekarang sudah sinkron menghapus 'promos'
        Schema::dropIfExists('promos');
    }
};