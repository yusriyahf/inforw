<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_bansos' => 'bantuan tunai bank bri',
                'total_bantuan' => 10000000,
                'jenis_bansos'  => 'tunai',
                'jumlah_penerima' => 10,
                'tipe_penerima' => 'individu',
                'tgl_akhir_daftar' => '2024-06-20',
                'tgl_penyaluran' => '2024-06-23'
            ],        
            [
                'nama_bansos' => 'bantuan sembako',
                'total_bantuan' => 20000000,
                'jenis_bansos'  => 'non-tunai',
                'jumlah_penerima' => 15,
                'tipe_penerima' => 'individu',
                'tgl_akhir_daftar' => '2024-06-20',
                'tgl_penyaluran' => '2024-06-25'
            ],        
            [
                'nama_bansos' => 'bantuan tunai pendidikan',
                'total_bantuan' => 11000000,
                'jenis_bansos'  => 'tunai',
                'jumlah_penerima' => 9,
                'tipe_penerima' => 'individu',
                'tgl_akhir_daftar' => '2024-06-20',
                'tgl_penyaluran' => '2024-06-26'
            ],
            [
                'nama_bansos' => 'bantuan tunai presiden',
                'total_bantuan' => 20000000,
                'jenis_bansos'  => 'tunai',
                'jumlah_penerima' => 10,
                'tipe_penerima' => 'individu',
                'tgl_akhir_daftar' => '2024-06-25',
                'tgl_penyaluran' => '2024-06-30'
            ],
            [
                'nama_bansos' => 'bantuan tunai DPR',
                'total_bantuan' => 15000000,
                'jenis_bansos'  => 'tunai',
                'jumlah_penerima' => 7,
                'tipe_penerima' => 'individu',
                'tgl_akhir_daftar' => '2024-06-15',
                'tgl_penyaluran' => '2024-06-14'
            ],        
        ];
        DB::table('bansos')->insert($data);
    }
}
