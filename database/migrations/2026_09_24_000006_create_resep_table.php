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
        Schema::create('resep', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kategori_resep_id')->constrained('kategori_resep')->cascadeOnDelete();
            $table->string('judul_resep');
            $table->integer('porsi');
            $table->string('foto')->nullable();
            $table->decimal('total_biaya', 12, 2)->default(0);
            $table->decimal('biaya_per_porsi', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep');
    }
};
