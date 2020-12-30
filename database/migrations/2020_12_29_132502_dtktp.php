<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dtktp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtktps', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('nama');
            $table->string('tmpLahir');
            $table->date('tglLahir');
            $table->enum('jenisKelamin',['laki-laki','perempuan']);
            $table->string('agama');
            $table->string('alamat');
            $table->string('status');
            $table->string('pekerjaan');
            $table->string('foto');

            $table->bigInteger('propinsi_id')->unsigned()->index();
            $table->bigInteger('kota_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('propinsi_id')
                ->references('id')->on('propinsis')
                ->onDelete('cascade');
            $table->foreign('kota_id')
                ->references('id')->on('kotas')
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
        //
    }
}
