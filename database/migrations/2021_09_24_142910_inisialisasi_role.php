<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\Permission;

class InisialisasiRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin Administrator', // optional
            'description' => 'Mengelola data driver dan user', // optional
        ]);
        
        $driver = Role::create([
            'name' => 'driver',
            'display_name' => 'Driver', // optional
            'description' => 'Menerima Orderan', // optional
        ]);

        $shipper = Role::create([
            'name' => 'shipper',
            'display_name' => 'Shipper', // optional
            'description' => 'Membuat orderan', // optional
        ]);

        $feed_manager = Role::create([
            'name' => 'feed-manager',
            'display_name' => 'Feed Manager', // optional
            'description' => 'Mengecek muatan', // optional
        ]);
            
        $createOrders = Permission::create([
                'name' => 'craete-orders',
                'display_name' => 'Add Orders', // optional
                'description' => 'add new Orders', // optional
            ]);
        $editOrders = Permission::create([
                'name' => 'edit-orders',
                'display_name' => 'Edit Orders', // optional
                'description' => 'edit existing orders', // optional
            ]);
        
        $deleteOrders = Permission::create([
            'name' => 'delete-orders',
            'display_name' => 'Delete Orders', // optional
            'description' => 'delete existing orders', // optional
        ]);
        $viewOrders = Permission::create([
            'name' => 'view-orders',
            'display_name' => 'View Orders', // optional
            'description' => 'View existing orders', // optional
        ]);
        
        $checkTheLoad = Permission::create([
            'name' => 'check-the-load',
            'display_name' => 'Check The Load', // optional
            'description' => 'Mengecek muatan', // optional
        ]);

            $admin->attachPermissions([$viewOrders, $checkTheLoad]);
            $driver->attachPermissions([$createOrders, $viewOrders]);
            $shipper->attachPermissions([$createOrders, $editOrders, $deleteOrders]);
            $feed_manager->attachPermissions([$createOrders, $checkTheLoad]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
