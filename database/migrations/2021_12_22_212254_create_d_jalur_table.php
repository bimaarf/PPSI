<?php

use App\Models\DriverJalur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDJalurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_jalur', function (Blueprint $table) {
            $table->id();
            $table->string('rute', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        DriverJalur::insert([
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
        Schema::dropIfExists('d_jalur');
    }
}
