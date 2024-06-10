<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendaftarBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 19,
                'bansos_id' => 1,
                'hasil_akhir' => 0.099054231142395,
                'rank' => 2,
                'status' => 'ditolak',
                'created_at' => '2024-06-09 03:37:49',
                'updated_at' => '2024-06-09 04:02:42'
            ],
            [
                'user_id' => 20,
                'bansos_id' => 1,
                'hasil_akhir' => -0.073530942017779,
                'rank' => 4,
                'status' => 'disetujui',
                'created_at' => '2024-06-09 03:38:47',
                'updated_at' => '2024-06-09 04:02:42'
            ],
            [
                'user_id' => 21,
                'bansos_id' => 1,
                'hasil_akhir' => -0.17918808487492,
                'rank' => 5,
                'status' => 'disetujui',
                'created_at' => '2024-06-09 03:39:38',
                'updated_at' => '2024-06-09 04:02:42'
            ],
            [
                'user_id' => 23,
                'bansos_id' => 1,
                'hasil_akhir' => 0.49046905798222,
                'rank' => 1,
                'status' => 'disetujui',
                'created_at' => '2024-06-09 03:40:40',
                'updated_at' => '2024-06-09 04:02:41'
            ],
            [
                'user_id' => 25,
                'bansos_id' => 1,
                'hasil_akhir' => -0.048798799160636,
                'rank' => 3,
                'status' => 'disetujui',
                'created_at' => '2024-06-09 03:50:36',
                'updated_at' => '2024-06-09 04:02:42'
            ],
        ];

        DB::table('pendaftar_bansos')->insert($data);
    }
}
