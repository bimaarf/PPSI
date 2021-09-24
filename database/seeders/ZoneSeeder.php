<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Zone;
class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zone')->delete();
        // 
        // Zone::create(
        //     ['zone' => 'Pontianak']);
        $zone = [
            ['zone' => 'Pontianak'],
            ['zone' => 'Sungai Pinyuh'],
            ['zone' => 'Mempawah'],
            ['zone' => 'Singkawang'],
            ['zone' => 'Pemangkat'],
            ['zone' => 'Tebas'],
            ['zone' => 'Sambas'],
            ['zone' => 'Simpang Ampar'],
            ['zone' => 'Sosok'],
            ['zone' => 'Bodok'],
            ['zone' => 'Sanggau'],
            ['zone' => 'Sekadau'],
            ['zone' => 'Sintang'],
            ['zone' => 'Tayan'],
            ['zone' => 'Balai Bekuak'],
            ['zone' => 'Sandai'],
            ['zone' => 'Nanga Tayap'],
            ['zone' => 'Ketapang'],
        ];
        Zone::insert($zone);

    }
}
