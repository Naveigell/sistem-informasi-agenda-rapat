<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinanRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('pimpinan_rapat')) {
            Schema::create('pimpinan_rapat', function (Blueprint $table) {
                $table->bigIncrements('id_pimpinan_rapat');
                $table->string('nama_pimpinan');
                $table->string('jabatan');
                $table->enum('jenis_kelamin', ['Laki - laki', 'Perempuan']);
                $table->string('no_telepon', 17);
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
        Schema::table('pimpinan_rapat', function (Blueprint $table) {
            //
        });
    }
}
