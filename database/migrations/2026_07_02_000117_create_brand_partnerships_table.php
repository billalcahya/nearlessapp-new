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
        Schema::create('brand_partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('logo_path')->comment('Menyimpan path file logo yang diupload');
            $table->string('website_url')->nullable();
            $table->string('partnership_period')->nullable()->comment('Contoh: Jan 2026 - Jun 2026 atau Sekarang');
            $table->string('collaboration_type')->nullable()->comment('Contoh: Tech Partner, Sponsor, dll');
            $table->text('reason_for_partnership')->comment('Alasan kenapa kerja sama');
            $table->text('project_outcome')->nullable()->comment('Hasil atau dampak dari kerja sama');

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
        Schema::dropIfExists('brand_partnerships');
    }
};