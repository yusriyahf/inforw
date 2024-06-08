<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'keluarga_id' => 1,
                'kepala_keluarga' => 1,
                'rw' => '1',
                'rt' => '1'
            ],
            [
                'keluarga_id' => 2,
                'kepala_keluarga' => 3,
                'rw' => '1',
                'rt' => '2'
            ],
            [
                'keluarga_id' => 3,
                'kepala_keluarga' => 4,
                'rw' => '1',
                'rt' => '2'
            ],
            [
                'keluarga_id' => 4,
                'kepala_keluarga' => 7,
                'rw' => '1',
                'rt' => '1'
            ],
            [
                'keluarga_id' => 5,
                'kepala_keluarga' => 10,
                'rw' => '1',
                'rt' => '3'
            ],
            [
                'keluarga_id' => 6,
                'kepala_keluarga' => 13,
                'rw' => '1',
                'rt' => '4'
            ],
            [
                'keluarga_id' => 7,
                'kepala_keluarga' => 16,
                'rw' => '1',
                'rt' => '5'
            ],
            [
                'keluarga_id' => 8,
                'kepala_keluarga' => 18,
                'rw' => '1',
                'rt' => '5'
            ],
            [
                'keluarga_id' => 9,
                'kepala_keluarga' => 21,
                'rw' => '1',
                'rt' => '1'
            ],
            [
                'keluarga_id' => 10,
                'kepala_keluarga' => 23,
                'rw' => '1',
                'rt' => '3'
            ],
            [
                'keluarga_id' => 11,
                'kepala_keluarga' => 25,
                'rw' => '1',
                'rt' => '4'
            ],
        ];

        foreach ($data as $item) {
            DB::table('keluarga')
                ->where('keluarga_id', $item['keluarga_id'])
                ->update([
                    'kepala_keluarga' => $item['kepala_keluarga'],
                    'rw' => $item['rw'],
                    'rt' => $item['rt']
                ]);
        }
    }
}
