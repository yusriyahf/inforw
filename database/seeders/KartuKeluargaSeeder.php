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
                // 'kartu_keluarga_id' => 1,
                'no_kk' => '357304',
                'kepala_keluarga' =>'Yusriyah Firjatullah',
                'rw'=>'1',
                'rt'=>'1'
            ],
            [
                // 'kartu_keluarga_id' => 2,
                'no_kk' => '357305',
                'kepala_keluarga' =>'Putri Ayu',
                'rw'=>'1',
                'rt'=>'2'
            ],
            [
                // 'kartu_keluarga_id' => 3,
                'no_kk' => '357306',
                'kepala_keluarga' =>'Aziz',
                'rw'=>'1',
                'rt'=>'2'
            ],
            [
                // 'kartu_keluarga_id' => 4,
                'no_kk' => '357307',
                'kepala_keluarga' =>'Ariel Tatum',
                'rw'=>'1',
                'rt'=>'1'
            ],
            [
                // 'kartu_keluarga_id' => 5,
                'no_kk' => '357308',
                'kepala_keluarga' =>'Denny Caknan',
                'rw'=>'1',
                'rt'=>'3'
            ],
            [
                // 'kartu_keluarga_id' => 6,
                'no_kk' => '357309',
                'kepala_keluarga' =>'Hasan',
                'rw'=>'1',
                'rt'=>'4'
            ],
            [
                // 'kartu_keluarga_id' => 7,
                'no_kk' => '357310',
                'kepala_keluarga' =>'Febri',
                'rw'=>'1',
                'rt'=>'2'
            ],
            [
                // 'kartu_keluarga_id' => 8,
                'no_kk' => '357311',
                'kepala_keluarga' =>'Imam',
                'rw'=>'1',
                'rt'=>'4'
            ],
            [
                // 'kartu_keluarga_id' => 9,
                'no_kk' => '357312',
                'kepala_keluarga' =>'Sois',
                'rw'=>'1',
                'rt'=>'1'
            ],
            [
                // 'kartu_keluarga_id' => 10,
                'no_kk' => '357313',
                'kepala_keluarga' =>'Badrul',
                'rw'=>'1',
                'rt'=>'3'
            ],
            [
                // 'kartu_keluarga_id' => 11,
                'no_kk' => '357314',
                'kepala_keluarga' =>'Sutejo',
                'rw'=>'1',
                'rt'=>'4'
            ],

        ];
        DB::table('keluarga')->insert($data);
    }
}