<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaRapatTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('peserta_rapat')) {
            Schema::create('peserta_rapat', function (Blueprint $table){
                $table->bigIncrements('id_peserta_rapat');
                $table->unsignedBigInteger('peserta_rapat_id_rapat');
                $table->string('nama_peserta', 30);
                $table->string('jabatan_peserta', 30);
                $table->enum('jenis_kelamin', ['Laki - laki', 'Perempuan']);

                $table->timestamps();

                $table->index('peserta_rapat_id_rapat');

                $table->foreign('peserta_rapat_id_rapat')->references('id_rapat')
                                                                ->on('agenda_rapat')
                                                                ->onDelete('cascade')
                                                                ->onUpdate('cascade');
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
        Schema::table('peserta_rapat', function (Blueprint $table) {
            //
        });
    }
}
