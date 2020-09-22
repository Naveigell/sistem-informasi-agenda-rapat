<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('surat_rapat')) {
            Schema::create('surat_rapat', function (Blueprint $table) {
                $table->bigIncrements('id_surat_rapat');
                $table->string('id_nomor_surat')->unique();
                $table->string('perihal_surat', 120);
                $table->string('tujuan_surat', 120);
                $table->text('isi_surat');
                $table->string('jabatan_pengirim', 70);
                $table->string('pengirim_surat', 70);
                $table->date('tanggal_surat');
                $table->timestamps();
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
        Schema::table('surat_rapat', function (Blueprint $table) {
            //
        });
    }
}
