<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weekly_checklists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('praza')->default(false);
            $table->boolean('jumah_prayer')->default(false);
            // bp_sk = buka puasa senin kamis
            $table->boolean('bp_sk')->default(false);
            $table->boolean('happy_family')->default(false);
            $table->boolean('happy_neighbour')->default(false);
            $table->date('date');

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
        Schema::dropIfExists('weekly_checklists');
    }
};
