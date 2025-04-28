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
        Schema::table('competition_bonus_products', function (Blueprint $table) {
            $table->string('free_register_product')->nullable()->change();
            $table->string('premium_register_product')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('competition_bonus_products', function (Blueprint $table) {
            $table->string('free_register_product')->nullable()->change();
            $table->string('premium_register_product')->nullable()->change();
        });
    }
};
