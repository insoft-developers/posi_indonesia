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
        Schema::create('hompages', function (Blueprint $table) {
            $table->id();
            $table->string('visi')->nullable();
            $table->text('misi')->nullable();
            $table->string('flow1')->nullable();
            $table->string('flow2')->nullable();
            $table->string('flow3')->nullable();
            $table->string('flow_image1')->nullable();
            $table->string('flow_image2')->nullable();
            $table->string('flow_image3')->nullable();
            $table->text('about_us')->nullable();
            $table->string('about_us_image')->nullable();
            $table->longText('privacy')->nullable();
            $table->longText('term')->nullable();
            $table->longText('refund')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hompages');
    }
};
