<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubKriteriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('sub_kriteria')->insert([
            ['sub_kriteria_id' => 1, 'kriteria_id' => 1, 'nama_sub_kriteria' => 'sedikit sekali', 'nilai' => 70],
            ['sub_kriteria_id' => 2, 'kriteria_id' => 1, 'nama_sub_kriteria' => 'sedikit', 'nilai' => 68],
            ['sub_kriteria_id' => 3, 'kriteria_id' => 1, 'nama_sub_kriteria' => 'banyak', 'nilai' => 67],
            ['sub_kriteria_id' => 4, 'kriteria_id' => 1, 'nama_sub_kriteria' => 'banyak sekali', 'nilai' => 65],
            
            ['sub_kriteria_id' => 5, 'kriteria_id' => 2, 'nama_sub_kriteria' => '1 lantai', 'nilai' => 80],
            ['sub_kriteria_id' => 6, 'kriteria_id' => 2, 'nama_sub_kriteria' => '2 lantai', 'nilai' => 78],
            ['sub_kriteria_id' => 7, 'kriteria_id' => 2, 'nama_sub_kriteria' => '3 lantai', 'nilai' => 76],
            ['sub_kriteria_id' => 8, 'kriteria_id' => 2, 'nama_sub_kriteria' => '>=4 lantai', 'nilai' => 70],
            ['sub_kriteria_id' => 9, 'kriteria_id' => 2, 'nama_sub_kriteria' => 'kontrak/numpang', 'nilai' => 83],
            
            ['sub_kriteria_id' => 10, 'kriteria_id' => 3, 'nama_sub_kriteria' => 'pengusaha', 'nilai' => 77],
            ['sub_kriteria_id' => 11, 'kriteria_id' => 3, 'nama_sub_kriteria' => 'karyawan swasta', 'nilai' => 78],
            ['sub_kriteria_id' => 12, 'kriteria_id' => 3, 'nama_sub_kriteria' => 'buruh', 'nilai' => 80],
            ['sub_kriteria_id' => 13, 'kriteria_id' => 3, 'nama_sub_kriteria' => 'pengangguran', 'nilai' => 83],
            
            ['sub_kriteria_id' => 14, 'kriteria_id' => 4, 'nama_sub_kriteria' => 'sedikit', 'nilai' => 95],
            ['sub_kriteria_id' => 15, 'kriteria_id' => 4, 'nama_sub_kriteria' => 'lumayan', 'nilai' => 90],
            ['sub_kriteria_id' => 16, 'kriteria_id' => 4, 'nama_sub_kriteria' => 'banyak', 'nilai' => 85],
            ['sub_kriteria_id' => 17, 'kriteria_id' => 4, 'nama_sub_kriteria' => 'banyak sekali', 'nilai' => 84],
            ['sub_kriteria_id' => 18, 'kriteria_id' => 4, 'nama_sub_kriteria' => 'Sangat Banyak sekali', 'nilai' => 80],
            
            ['sub_kriteria_id' => 19, 'kriteria_id' => 5, 'nama_sub_kriteria' => '>= 4 orang', 'nilai' => 68],
            ['sub_kriteria_id' => 20, 'kriteria_id' => 5, 'nama_sub_kriteria' => '>= 6 orang', 'nilai' => 70],
            ['sub_kriteria_id' => 21, 'kriteria_id' => 5, 'nama_sub_kriteria' => '>=7 orang', 'nilai' => 73],
            ['sub_kriteria_id' => 22, 'kriteria_id' => 5, 'nama_sub_kriteria' => '>=10 orang', 'nilai' => 75],
            
            ['sub_kriteria_id' => 23, 'kriteria_id' => 6, 'nama_sub_kriteria' => 'Sakit', 'nilai' => 85],
            ['sub_kriteria_id' => 24, 'kriteria_id' => 6, 'nama_sub_kriteria' => 'Lumayan sehat', 'nilai' => 83],
            ['sub_kriteria_id' => 25, 'kriteria_id' => 6, 'nama_sub_kriteria' => 'Sehat', 'nilai' => 80],
            ['sub_kriteria_id' => 26, 'kriteria_id' => 6, 'nama_sub_kriteria' => 'Sehat sekali', 'nilai' => 79],
            ['sub_kriteria_id' => 27, 'kriteria_id' => 6, 'nama_sub_kriteria' => 'Sangat sehat sekali', 'nilai' => 75],
            
            ['sub_kriteria_id' => 28, 'kriteria_id' => 7, 'nama_sub_kriteria' => '>=3', 'nilai' => 67],
            ['sub_kriteria_id' => 29, 'kriteria_id' => 7, 'nama_sub_kriteria' => '>=5', 'nilai' => 68],
            ['sub_kriteria_id' => 30, 'kriteria_id' => 7, 'nama_sub_kriteria' => '>=7', 'nilai' => 70],
            ['sub_kriteria_id' => 31, 'kriteria_id' => 7, 'nama_sub_kriteria' => '>=10', 'nilai' => 75],
        ]);
    }
}

