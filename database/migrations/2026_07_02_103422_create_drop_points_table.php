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
        Schema::create('drop_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_partnership_id')
                ->nullable()
                ->constrained('brand_partnerships')
                ->onDelete('cascade');

            $table->string('name')->comment('Misal: Gudang Utama/Cabang Jakarta');
            $table->text('address')->comment('Alamat lengkap lokasi drop point');
            $table->string('coordinates')->nullable()->comment('Latitude, longitude');
            $table->string('image_path')->nullable()->comment('Menyimpan foto lokasi drop point');
            $table->json('operational_hours')->nullable()->comment('Menyimpan data hari dan jam operasional');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drop_points');
    }
};
