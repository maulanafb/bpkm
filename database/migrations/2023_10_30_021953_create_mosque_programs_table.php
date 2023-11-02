<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_programs_table.php

    public function up()
    {
        Schema::create('mosque_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('five_daily_prayer');
            $table->boolean('jumah_prayer');
            $table->boolean('smk');
            $table->boolean('odoj');
            $table->boolean('praza');
            $table->boolean('khatam_quran');
            // buka puasa senin kamis
            $table->boolean('bp_sk');
            // al mulk after maghrib
            $table->boolean('almulk_am');
            $table->boolean('happy_neightbor');
            $table->boolean('happy_family');

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
        Schema::dropIfExists('programs');
    }
};
