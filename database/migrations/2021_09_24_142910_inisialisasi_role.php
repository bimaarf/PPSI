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
        $super_admin = Role::create([
            'name' => 'super-admin',
            'display_name' => 'Super Admin', // optional
            'description' => 'Mengelola data admin | driver | shipper | field manager', // optional
        ]);
        
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin Administrator', // optional
            'description' => 'Mengelola data | driver | user | field manager', // optional
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

        $field_manager = Role::create([
            'name' => 'feed-manager',
            'display_name' => 'Field Manager', // optional
            'description' => 'Mengecek muatan', // optional
        ]);
            
        $dashboard = Permission::create([
                'name' => 'dashboard-admin',
                'display_name' => 'Dashboard admin', // optional
                'description' => 'Full access dashboard admin', // optional
        ]);

        $register_user = Permission::create([
                'name' => 'register-user',
                'display_name' => 'Registrasi Admin / Field Manager', // optional
                'description' => 'Meregistrasikan akun admin | Field Manager', // optional
        ]);

        $pesan_armada = Permission::create([
                'name' => 'craete-orders',
                'display_name' => 'Membuat pesanan', // optional
                'description' => 'add new Orders', // optional
        ]);

        
        $lihat_admin = Permission::create([
            'name' => 'melihat-data-admin',
            'display_name' => 'Melihat data admin', // optional
            'description' => 'Melihat data admin - ', // optional
        ]);
        $kelola_admin = Permission::create([
            'name' => 'mengelola-data-admin',
            'display_name' => 'Mengelola data admin', // optional
            'description' => 'Mengelola data admin aktif | nonaktif', // optional
        ]);
        $lihat_driver = Permission::create([
            'name' => 'melihat-data-driver',
            'display_name' => 'Melihat data driver', // optional
            'description' => 'Melihat data driver - ', // optional
        ]);
        $kelola_driver = Permission::create([
            'name' => 'mengelola-data-driver',
            'display_name' => 'Mengelola data driver', // optional
            'description' => 'Mengelola data driver aktif | nonaktif', // optional
        ]);
        $lihat_shipper = Permission::create([
            'name' => 'melihat-data-shipper',
            'display_name' => 'Melihat data shipper', // optional
            'description' => 'Melihat data shipper - ', // optional
        ]);
        $kelola_shipper = Permission::create([
            'name' => 'mengelola-data-shipper',
            'display_name' => 'Mengelola data shipper', // optional
            'description' => 'Mengelola data shipper aktif | nonaktif', // optional
        ]);
        $lihat_manager = Permission::create([
            'name' => 'melihat-data-manager',
            'display_name' => 'Melihat data field manager', // optional
            'description' => 'Melihat data field manager - ', // optional
        ]);
        $kelola_manager = Permission::create([
            'name' => 'mengelola-data-manager',
            'display_name' => 'Mengelola data field manager', // optional
            'description' => 'Mengelola data field manager aktif | nonaktif', // optional
        ]);

            $super_admin->attachPermissions([$dashboard, $lihat_admin, $kelola_admin, $lihat_driver, $kelola_driver, $lihat_shipper, $kelola_shipper, $lihat_manager, $kelola_manager, $register_user]);
            $driver->attachPermissions([$dashboard]);
            $shipper->attachPermissions([$pesan_armada]);
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
