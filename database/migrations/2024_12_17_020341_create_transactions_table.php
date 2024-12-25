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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->integer('competition_id');
            $table->integer('amount');
            $table->integer('userid');
            $table->integer('payment_status');
            $table->integer('is_fisik');
            $table->integer('transaction_status');
            $table->string('image')->nullable();
            $table->string('payment_with')->nullable();
            $table->integer('payment_amount')->nullable();
            $table->datetime('payment_date')->nullable();
            $table->integer('is_premium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
