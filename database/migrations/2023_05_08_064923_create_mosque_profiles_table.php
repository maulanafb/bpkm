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
            $table->unsignedBigInteger('user_id');
            $table->string('photo_path');
            $table->text('problem');
            $table->string('funding_plan');
            $table->string('funding_needs');

            $table->String('mosque_account_number');
            $table->String('bmi_account_number');
            $table->text('history');
            $table->text('address');
            $table->char('regency_id');
            $table->char('province_id');
            $table->String('coordinator');
            $table->string('phone_number');
            $table->foreign('province_id')
            ->references('id')
            ->on('provinces')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('regency_id')
            ->references('id')
            ->on('regencies')
            ->onUpdate('cascade')
            ->onDelete('restrict');
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('restrict');
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
