<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi_a', 255);
            $table->string('kab_kota_a', 255);
            $table->bigInteger('telp_a');
            $table->string('alamat_a', 255);
            $table->string('armada', 255);
            $table->string('jadwal', 255);
            $table->bigInteger('multi');
            $table->string('jenis_barang', 255);
            $table->string('jumlah_barang', 255);
            $table->bigInteger('panjang');
            $table->bigInteger('lebar');
            $table->bigInteger('tinggi');
// penerima
            $table->string('provinsi_b', 255);
            $table->string('kab_kota_b', 255);
            $table->bigInteger('telp_b');
            $table->bigInteger('total');
            $table->string('alamat_b', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
}
