<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqKonsulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('req_konsuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedBigInteger('dokter_id');
            $table->timestamp('tgl_konsul')->nullable();
            $table->string('deskripsi');
            $table->string('acc_dokter')->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();

            $table->foreign('mhs_id')->references('id')->on('mahasiswas');
            $table->foreign('dokter_id')->references('id')->on('dokters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('req_konsuls');
    }
}
