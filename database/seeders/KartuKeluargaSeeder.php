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
        // $data = [
        //     [
        //         'keluarga_id' => 1,
        //         'no_kk' => '357304',
        //         'kepala_keluarga' =>1,
        //         'rw'=>'1',
        //         'rt'=>'1'
        //     ],
        //     [
        //         'keluarga_id' => 2,
        //         'no_kk' => '357305',
        //         'kepala_keluarga' =>3,
        //         'rw'=>'1',
        //         'rt'=>'2'
        //     ],
        //     [
        //         'keluarga_id' => 3,
        //         'no_kk' => '357306',
        //         'kepala_keluarga' =>4,
        //         'rw'=>'1',
        //         'rt'=>'2'
        //     ],
        //     [
        //         'keluarga_id' => 4,
        //         'no_kk' => '357307',
        //         'kepala_keluarga' =>7,
        //         'rw'=>'1',
        //         'rt'=>'1'
        //     ],
        //     [
        //         'keluarga_id' => 5,
        //         'no_kk' => '357308',
        //         'kepala_keluarga' =>10,
        //         'rw'=>'1',
        //         'rt'=>'3'
        //     ],
        //     [
        //         'keluarga_id' => 6,
        //         'no_kk' => '357309',
        //         'kepala_keluarga' =>13,
        //         'rw'=>'1',
        //         'rt'=>'4'
        //     ],
        //     [
        //         'keluarga_id' => 7,
        //         'no_kk' => '357310',
        //         'kepala_keluarga' =>16,
        //         'rw'=>'1',
        //         'rt'=>'5'
        //     ],
        //     [
        //         'keluarga_id' => 8,
        //         'no_kk' => '357311',
        //         'kepala_keluarga' =>18,
        //         'rw'=>'1',
        //         'rt'=>'5'
        //     ],
        //     [
        //         'keluarga_id' => 9,
        //         'no_kk' => '357312',
        //         'kepala_keluarga' =>21,
        //         'rw'=>'1',
        //         'rt'=>'1'
        //     ],
        //     [
        //         'keluarga_id' => 10,
        //         'no_kk' => '357313',
        //         'kepala_keluarga' =>23,
        //         'rw'=>'1',
        //         'rt'=>'3'
        //     ],
        //     [
        //         'keluarga_id' => 11,
        //         'no_kk' => '357314',
        //         'kepala_keluarga' =>25,
        //         'rw'=>'1',
        //         'rt'=>'4'
        //     ],

        // ];

        $data = [
            ['keluarga_id' => 1, 'no_kk' => '357304', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 2, 'no_kk' => '357305', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 3, 'no_kk' => '357306', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 4, 'no_kk' => '357307', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 5, 'no_kk' => '357308', 'rw' => '1', 'rt' => '3'],
            ['keluarga_id' => 6, 'no_kk' => '357309', 'rw' => '1', 'rt' => '4'],
            ['keluarga_id' => 7, 'no_kk' => '357310', 'rw' => '1', 'rt' => '5'],
            ['keluarga_id' => 8, 'no_kk' => '357311', 'rw' => '1', 'rt' => '5'],
            ['keluarga_id' => 9, 'no_kk' => '357312', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 10, 'no_kk' => '357313', 'rw' => '1', 'rt' => '3'],
            ['keluarga_id' => 11, 'no_kk' => '357314', 'rw' => '1', 'rt' => '4'],
        ];
        DB::table('keluarga')->insert($data);
    }
}
