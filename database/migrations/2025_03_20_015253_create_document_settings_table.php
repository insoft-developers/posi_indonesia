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
        Schema::create('document_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('competition_id');
            $table->string('document_type');
            $table->integer('name_top')->nullable();
            $table->integer('name_bottom')->nullable();
            $table->integer('name_left')->nullable();
            $table->integer('name_right')->nullable();
            $table->integer('name_font_size')->nullable();
            $table->string('name_font_color')->nullable();
            $table->integer('school_top')->nullable();
            $table->integer('school_bottom')->nullable();
            $table->integer('school_left')->nullable();
            $table->integer('school_right')->nullable();
            $table->integer('scholl_font_size')->nullable();
            $table->string('school_font_color')->nullable();
            $table->integer('province_top')->nullable();
            $table->integer('province_bottom')->nullable();
            $table->integer('province_left')->nullable();
            $table->integer('province_right')->nullable();
            $table->integer('province_font_size')->nullable();
            $table->string('province_font_color')->nullable();
            $table->integer('level_top')->nullable();
            $table->integer('level_bottom')->nullable();
            $table->integer('level_left')->nullable();
            $table->integer('level_right')->nullable();
            $table->integer('level_font_size')->nullable();
            $table->string('level_font_color')->nullable();
            $table->integer('study_top')->nullable();
            $table->integer('study_bottom')->nullable();
            $table->integer('study_left')->nullable();
            $table->integer('study_right')->nullable();
            $table->integer('study_font_size')->nullable();
            $table->string('study_font_color')->nullable();
            $table->integer('desc_top')->nullable();
            $table->integer('desc_bottom')->nullable();
            $table->integer('desc_left')->nullable();
            $table->integer('desc_right')->nullable();
            $table->integer('desc_font_size')->nullable();
            $table->string('desc_font_color')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_settings');
    }
};
