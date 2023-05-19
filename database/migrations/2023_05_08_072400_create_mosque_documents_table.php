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
        Schema::create('mosque_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mosque_id');
            $table->string('land_title_deed');
            $table->string('mosque_photo');
            $table->string('mosque_design');
            $table->foreign('mosque_id')->references('id')->on('mosques')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosque_documents');
    }
};