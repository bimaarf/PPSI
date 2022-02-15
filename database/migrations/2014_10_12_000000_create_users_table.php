<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('telp')->nullable();
            $table->string('alamat',255)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('users_status');
            $table->string('avatar',255);
            $table->string('location',255)->default('Pontianak');

            $table->rememberToken();
            $table->timestamps();
        });
        User::insert([
            [
                'name'  => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'telp'     => '62895704855745',
                'alamat'   => 'Pontianak - Kota baru',
                'status_id'   => '1',
                'avatar'   => 'Driver.svg'
            ],
            [
                'name'  => 'shipper',
                'email' => 'shipper@gmail.com',
                'password' => Hash::make('admin'),
                'telp'     => '62895704855745',
                'alamat'   => 'Pontianak - Kota baru',
                'status_id'   => '1',
                'avatar'   => 'Shipper.svg'

            ],
            [
                'name'  => 'driver1',
                'email' => 'driver1@gmail.com',
                'password' => Hash::make('admin'),
                'telp'     => '62895704855745',
                'alamat'   => 'Pontianak - Kota baru',
                'status_id'   => '1',
                'avatar'   => 'Driver.svg'
            ],
            [
                'name'  => 'driver2',
                'email' => 'driver2@gmail.com',
                'password' => Hash::make('admin'),
                'telp'     => '62895704855745',
                'alamat'   => 'Pontianak - Kota baru',
                'status_id'   => '1',
                'avatar'   => 'Driver.svg'
            ],
            [
                'name'  => 'driver3',
                'email' => 'driver3@gmail.com',
                'password' => Hash::make('admin'),
                'telp'     => '62895704855745',
                'alamat'   => 'Pontianak - Kota baru',
                'status_id'   => '1',
                'avatar'   => 'Driver.svg'
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
        Schema::dropIfExists('users');
    }
}
