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
                        'nama_bansos' => 'bantuan langsung tunai',
                        'total_bantuan' => 10000000,
                        'jenis_bansos'  => 'tunai',
                        'jumlah_penerima' => 10,
                        'tipe_penerima' => 'individu',
                        'tgl_akhir_daftar' => '2024-05-20',
                        'tgl_penyaluran' => '2024-05-23'
                    ],        
                    [
                        'nama_bansos' => 'bantuan sembako',
                        'total_bantuan' => 20000000,
                        'jenis_bansos'  => 'non-tunai',
                        'jumlah_penerima' => 15,
                        'tipe_penerima' => 'individu',
                        'tgl_akhir_daftar' => '2024-05-20',
                        'tgl_penyaluran' => '2024-05-25'
                    ],        
                    [
                        'nama_bansos' => 'bantuan tunai pendidikan',
                        'total_bantuan' => 11000000,
                        'jenis_bansos'  => 'tunai',
                        'jumlah_penerima' => 9,
                        'tipe_penerima' => 'individu',
                        'tgl_akhir_daftar' => '2024-05-20',
                        'tgl_penyaluran' => '2024-05-26'
                    ],        
                ];
                DB::table('bansos')->insert($data);
    }
}
