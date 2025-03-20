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
        Schema::table('document_settings', function (Blueprint $table) {
            $table->string('name_font_family')->after('name_font_color')->nullable();
            $table->string('name_font_style')->after('name_font_family')->nullable();
            $table->string('name_font_weight')->after('name_font_style')->nullable();

            $table->string('school_font_family')->after('school_font_color')->nullable();
            $table->string('school_font_style')->after('school_font_family')->nullable();
            $table->string('school_font_weight')->after('school_font_style')->nullable();

            $table->string('province_font_family')->after('province_font_color')->nullable();
            $table->string('province_font_style')->after('province_font_family')->nullable();
            $table->string('province_font_weight')->after('province_font_style')->nullable();

            $table->string('level_font_family')->after('level_font_color')->nullable();
            $table->string('level_font_style')->after('level_font_family')->nullable();
            $table->string('level_font_weight')->after('level_font_style')->nullable();

            $table->string('study_font_family')->after('study_font_color')->nullable();
            $table->string('study_font_style')->after('study_font_family')->nullable();
            $table->string('study_font_weight')->after('study_font_style')->nullable();

            $table->string('desc_font_family')->after('desc_font_color')->nullable();
            $table->string('desc_font_style')->after('desc_font_family')->nullable();
            $table->string('desc_font_weight')->after('desc_font_style')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_settings', function (Blueprint $table) {
            //
        });
    }
};
