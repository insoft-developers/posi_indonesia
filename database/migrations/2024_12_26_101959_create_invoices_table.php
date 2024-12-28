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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->integer('userid');
            $table->integer('total_amount');
            $table->integer('payment_status');
            $table->integer('transaction_status');
            $table->string('image');
            $table->string('payment_with');
            $table->integer('payment_amount');
            $table->datetime('payment_date');
            $table->datetime('expired_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
