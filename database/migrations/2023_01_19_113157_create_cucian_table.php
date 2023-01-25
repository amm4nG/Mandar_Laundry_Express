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
        Schema::create('cucian', function (Blueprint $table) {
            $table->id();
            $table->string('no_hp');
            $table->text('alamat');
            $table->date('tanggal_pengambilan');
            $table->integer('id_user');
            $table->integer('id_paket');
            $table->integer('id_layanan');
            $table->string('status');
            $table->text('pesan');
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
        Schema::dropIfExists('cucian');
    }
};