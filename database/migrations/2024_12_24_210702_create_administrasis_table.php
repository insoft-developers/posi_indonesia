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
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->string('province_code');
            $table->string('province_name');
            $table->string('regency_code');
            $table->string('regency_name');
            $table->string('district_code');
            $table->string('district_name');
            $table->string('nspn');
            $table->string('school_name');
            $table->string('bentuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasis');
    }
};
