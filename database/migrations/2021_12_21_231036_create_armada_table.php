<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Armada;
class CreateArmadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Armada::insert([
            ['name' =>  'CDD BOX'],
            ['name' =>  'CDD Reefer'],
            ['name' =>  'Blindvan'],
            ['name' =>  'CDD Bak'],
            ['name' =>  'Pick-Up'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armada');
    }
}
