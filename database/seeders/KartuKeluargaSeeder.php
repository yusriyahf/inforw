<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kartu_keluarga_id' => 1,
                'no_kk' => '357304',
            ],
            [
                'kartu_keluarga_id' => 2,
                'no_kk' => '357305',
            ],
            [
                'kartu_keluarga_id' => 3,
                'no_kk' => '357306',
            ],

        ];
        DB::table('kartu_keluarga')->insert($data);
    }
}
