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
        Schema::create('mosques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('address');
            $table->unsignedBigInteger('regency_id');
            $table->unsignedBigInteger('province_id');
            $table->String('coordinator');
            $table->String('mosque_account_number');
            $table->String('bmi_account_number');
            $table->text('history');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('regency_id')->references('id')->on('regencies')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};