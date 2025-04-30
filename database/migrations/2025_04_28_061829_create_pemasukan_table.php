<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanTable extends Migration
{
    public function up()
    {
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deskripsi');
            $table->decimal('jumlah', 15, 2);
            $table->unsignedBigInteger('id_dana');
            $table->timestamps();

            $table->foreign('id_dana')->references('id')->on('danas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
