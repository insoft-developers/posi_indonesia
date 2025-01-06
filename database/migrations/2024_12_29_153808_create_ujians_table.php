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
        Schema::create('ujians', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_id');
            $table->integer('study_id');
            $table->integer('level_id');
            $table->integer('question_number');
            $table->string('question_title');
            $table->string('question_image')->nullable();
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->string('option_e');
            $table->string('option_image_a')->nullable();
            $table->string('option_image_b')->nullable();
            $table->string('option_image_c')->nullable();
            $table->string('option_image_d')->nullable();
            $table->string('option_image_e')->nullable();
            $table->integer('score');
            $table->string('answer_key');
            $table->integer('admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};
