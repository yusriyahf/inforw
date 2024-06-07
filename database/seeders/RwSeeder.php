<?php

namespace Database\Seeders;

use App\Models\RwModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'rw_id' => 1,
                'nama' => '03',
                'ketua'=>2,
                'sekretaris'=>24,
                'bendahara'=>22
            ],
           
        ];
        DB::table('rw')->insert($data);
    }
}
