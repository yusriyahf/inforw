<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaBansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kriteria_id' => 1,
                'bansos_id' => 1,
                'nama_kriteria' => 'aset',
                'jenis_kriteria' => 'cost',
                'bobot' => 0.028
            ],
            [
                'kriteria_id' => 2,
                'bansos_id' => 1,
                'nama_kriteria' => 'tempat tinggal',
                'jenis_kriteria' => 'cost',
                'bobot' => 0.061
            ],
            [
                'kriteria_id' => 3,
                'bansos_id' => 1,
                'nama_kriteria' => 'pekerjaan',
                'jenis_kriteria' => 'cost',
                'bobot' => 0.132
            ],
            [
                'kriteria_id' => 4,
                'bansos_id' => 1,
                'nama_kriteria' => 'pendapatan keluarga',
                'jenis_kriteria' => 'cost',
                'bobot' => 0.279
            ],
            [
                'kriteria_id' => 5,
                'bansos_id' => 1,
                'nama_kriteria' => 'beban tanggungan',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.053
            ],
            [
                'kriteria_id' => 6,
                'bansos_id' => 1,
                'nama_kriteria' => 'kondisi kesehatan',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.130
            ],
            [
                'kriteria_id' => 7,
                'bansos_id' => 1,
                'nama_kriteria' => 'jumlah anggota',
                'jenis_kriteria' => 'benefit',
                'bobot' => 0.317
            ],
            
        ];
        DB::table('kriteria')->insert($data);
    }
}
