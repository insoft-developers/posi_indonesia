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
        Schema::create('session_hitungs', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id');
            $table->integer('transaction_id');
            $table->integer('invoice_id');
            $table->integer('competition_id');
            $table->integer('study_id');
            $table->integer('userid');
            $table->integer('is_finish')->nullable();
            $table->integer('jumlah_benar')->nullable();
            $table->integer('jumlah_salah')->nullable();
            $table->integer('jumlah_lewat')->nullable();
            $table->integer('total_score')->nullable();
            $table->integer('medali')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_hitungs');
    }
};
