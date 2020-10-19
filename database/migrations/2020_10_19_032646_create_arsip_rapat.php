<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipRapat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_rapat', function (Blueprint $table) {
            $table->bigIncrements('id_arsip_rapat');
            $table->unsignedBigInteger('arsip_rapat_id_agenda_rapat');
            $table->text('hasil_rapat');
            $table->timestamps();

            $table->index('arsip_rapat_id_agenda_rapat');
            $table->foreign('arsip_rapat_id_agenda_rapat')
                ->references('id_rapat')
                ->on('agenda_rapat')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_rapat');
    }
}
