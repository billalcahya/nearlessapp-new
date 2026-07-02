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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();

            // Kolom Relasi Self-Referencing untuk Layanan Pembanding (Comparison)
            $table->foreignId('comparison_service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            // Kolom Relasi Self-Referencing 2 (Layanan Pembanding Kedua)
            $table->foreignId('comparison_service_two_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            // Tambahan kolom baru berdasarkan field di ServiceForm
            $table->string('suitability')->nullable();
            $table->string('intensity')->nullable(); // Menampung low, medium, high
            $table->string('sanitazion')->nullable();

            $table->integer('base_price')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->integer('estimated_duration')->nullable();

            // Tambahan kolom JSON untuk menyimpan data Repeater "What's Included"
            $table->json('whats_included')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_landing')->default(true);
            
            // Kolom baru untuk menandai layanan terlaris (Top Sellers) di Pricelist
            $table->boolean('is_top_seller')->default(false);

            $table->json('reviews')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};