<?php

use App\Models\DriverArmada;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDArmadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_armada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('armada_id')->nullable();
            $table->foreign('armada_id')->references('id')->on('armada');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        DriverArmada::insert([
            [
                'user_id' => '3',
            ],
            [
                'user_id' => '4',
            ],
            [
                'user_id' => '5',
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_armada');
    }
}
