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
        Schema::create('riwayat_harga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bahan_id')->constrained('bahan_baku')->cascadeOnDelete();
            $table->decimal('harga_lama', 12, 2);
            $table->decimal('harga_baru', 12, 2);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_harga');
    }
};
