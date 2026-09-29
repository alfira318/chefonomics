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
        Schema::create('bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('kategori_bahan_id')->constrained('kategori_bahan')->cascadeOnDelete();
            $table->foreignId('satuan_id')->constrained('satuan')->cascadeOnDelete();
            $table->string('nama_bahan');
            $table->decimal('harga_beli', 12, 2);
            $table->decimal('kuantitas_beli', 10, 2);
            $table->enum('status', ['approved', 'pending'])->default('approved');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_baku');
    }
};
