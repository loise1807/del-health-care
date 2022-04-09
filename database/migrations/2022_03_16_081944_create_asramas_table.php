<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asramas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asrama');
            $table->string('jenis_asrama');
            $table->string('lokasi_asrama');
            $table->string('alamat_asrama');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asramas');
    }
}
