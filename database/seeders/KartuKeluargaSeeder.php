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
            ['keluarga_id' => 1, 'no_kk' => '350700000001', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 2, 'no_kk' => '350700000002', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 3, 'no_kk' => '350700000003', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 4, 'no_kk' => '350700000004', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 5, 'no_kk' => '350700000005', 'rw' => '1', 'rt' => '3'],
            ['keluarga_id' => 6, 'no_kk' => '350700000006', 'rw' => '1', 'rt' => '4'],
            ['keluarga_id' => 7, 'no_kk' => '350700000007', 'rw' => '1', 'rt' => '5'],
            ['keluarga_id' => 8, 'no_kk' => '350700000008', 'rw' => '1', 'rt' => '5'],
            ['keluarga_id' => 9, 'no_kk' => '350700000009', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 10, 'no_kk' => '350700000010', 'rw' => '1', 'rt' => '3'],
            ['keluarga_id' => 11, 'no_kk' => '350700000011', 'rw' => '1', 'rt' => '4'],
            ['keluarga_id' => 12, 'no_kk' => '350700000012', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 13, 'no_kk' => '350700000013', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 14, 'no_kk' => '350700000014', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 15, 'no_kk' => '350700000015', 'rw' => '1', 'rt' => '1'],
            ['keluarga_id' => 16, 'no_kk' => '350700000016', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 17, 'no_kk' => '350700000017', 'rw' => '1', 'rt' => '2'],
            ['keluarga_id' => 18, 'no_kk' => '350700000018', 'rw' => '1', 'rt' => '3'],
            ['keluarga_id' => 19, 'no_kk' => '350700000019', 'rw' => '1', 'rt' => '4'],
            ['keluarga_id' => 20, 'no_kk' => '350700000020', 'rw' => '1', 'rt' => '4'],
            ['keluarga_id' => 21, 'no_kk' => '350700000021', 'rw' => '1', 'rt' => '5'],
        ];
        DB::table('keluarga')->insert($data);
    }
}
