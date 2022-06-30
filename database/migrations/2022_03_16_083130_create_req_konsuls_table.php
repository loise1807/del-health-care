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
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->timestamp('tgl_konsul');
            $table->string('deskripsi');
            $table->string('acc_dokter')->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();

            $table->foreign('mhs_id')->references('id')->on('mahasiswas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade')->onUpdate('cascade');
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
