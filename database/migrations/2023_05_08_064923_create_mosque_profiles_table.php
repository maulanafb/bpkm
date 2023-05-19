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
        Schema::create('mosque_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mosque_id');
            $table->text('problem');
            $table->string('funding_plan');
            $table->string('funding_needs');
            $table->string('building_area');
            $table->foreign('mosque_id')->references('id')->on('mosques')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosque_profiles');
    }
};