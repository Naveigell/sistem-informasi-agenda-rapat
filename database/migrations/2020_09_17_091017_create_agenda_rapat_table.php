<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('agenda_rapat')) {
            Schema::create('agenda_rapat', function (Blueprint $table) {
                $table->bigIncrements('id_rapat');
                $table->unsignedBigInteger('rapat_id_pimpinan_rapat');
                $table->string('rapat_id_nomor_surat');

                $table->index('rapat_id_pimpinan_rapat');
                $table->index('rapat_id_nomor_surat');

                $table->string('perihal_rapat', 40);
                $table->date('jadwal_rapat');
                $table->time('waktu_rapat');
                $table->string('ruangan_rapat');
                $table->timestamps();

                // add foreign key
                $table->foreign('rapat_id_pimpinan_rapat')->references('id_pimpinan_rapat')->on('pimpinan_rapat')->onDelete('cascade');
                $table->foreign('rapat_id_nomor_surat')->references('id_nomor_surat')->on('surat_rapat')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agenda_rapat', function (Blueprint $table) {
            //
        });
    }
}
