<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('users');
            $table->string('jenis', 255)->nullable();
            $table->string('merek', 255)->nullable();
            $table->string('tahun', 255)->nullable();
            $table->string('nomor', 255)->nullable();
            $table->string('img_nomor', 255)->nullable();
            $table->string('klr', 255)->nullable();
            $table->string('img_klr', 255)->nullable();
            $table->string('pajak', 255)->nullable();
            $table->string('img_pajak', 255)->nullable();
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
        Schema::dropIfExists('d_kendaraan');
    }
}
