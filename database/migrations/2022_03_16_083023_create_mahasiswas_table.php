<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->unsignedBigInteger('asrama_id')->nullable();;
            $table->integer('nim')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('prodi');
            $table->integer('angkatan');
            $table->string('alamat')->nullable();
            $table->string('image')->nullable();
            $table->string('no_telp')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('asrama_id')->references('id')->on('asramas')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
