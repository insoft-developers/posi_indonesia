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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->time('start_time');
            $table->time('finish_time');
            $table->date('start_registration_date');
            $table->date('finish_registration_date');
            $table->time('start_registration_time');
            $table->time('finish_registration_time');
            $table->integer('type');
            $table->integer('price');
            $table->string('image');
            $table->integer('is_active');
            $table->string('level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
