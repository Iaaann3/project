<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deskripsi');
            $table->decimal('jumlah', 15, 2);
            $table->unsignedBigInteger('id_dana');
            $table->timestamps();

            // Membuat foreign key untuk relasi dengan tabel dana
            $table->foreign('id_dana')->references('id')->on('danas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
