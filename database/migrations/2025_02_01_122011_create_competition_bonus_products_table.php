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
        Schema::create('competition_bonus_products', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_id');
            $table->string('free_register_product');
            $table->string('premium_register_product');
            $table->string('bonus_for');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_bonus_products');
    }
};
