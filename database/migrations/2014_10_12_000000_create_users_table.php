<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('nama_lengkap');
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->enum('jenis_kelamin', ['L', 'P'])->nullable(); // Tambah nullable
    $table->text('alamat')->nullable();
    $table->string('no_telp', 15)->nullable(); // Tambah nullable
    $table->string('password');
    // $table->boolean('is_admin')->default(0); // Uncomment ini juga
    $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
