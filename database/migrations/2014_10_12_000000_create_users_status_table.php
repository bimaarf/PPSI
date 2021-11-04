<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserStatus;
class CreateUsersStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_status', function (Blueprint $table) {
            $table->id();
            $table->string('status', 155);
            $table->timestamps();
        });
        UserStatus::insert([
            [
                'status'  => 'Aktif'
            ],
            [
                'status'  => 'Tidak Aktif'
            ],
            [
                'status'  => 'Sibuk'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_status');
    }
}
