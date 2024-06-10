<?php

namespace Database\Seeders;

use App\Models\Rt;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     [
        //         'rt_id' => 1,
        //         'nama' => '01',
        //         'ketua'=>7,
        //         'sekretaris'=>9,
        //         'bendahara'=>8
        //     ],
        //     [
        //         'rt_id' => 2,
        //         'nama' => '02',
        //         'ketua'=>3,
        //         'sekretaris'=>5,
        //         'bendahara'=>6
        //     ],
        //     [
        //         'rt_id' => 3,
        //         'nama' => '03',
        //         'ketua'=>10,
        //         'sekretaris'=>11,
        //         'bendahara'=>12
        //     ],
        //     [
        //         'rt_id' => 4,
        //         'nama' => '04',
        //         'ketua'=>13,
        //         'sekretaris'=>14,
        //         'bendahara'=>15
        //     ],
        //     [
        //         'rt_id' => 5,
        //         'nama' => '05',
        //         'ketua'=>16,
        //         'sekretaris'=>17,
        //         'bendahara'=>18
        //     ],
        // [
        //     'rt_id' => 6,
        //     'nama' => '06',
        // ],
        // [
        //     'rt_id' => 7,
        //     'nama' => '07',
        // ],
        // [
        //     'rt_id' => 8,
        //     'nama' => '08',
        // ],
        // [
        //     'rt_id' => 9,
        //     'nama' => '09',
        // ],
        // [
        //     'rt_id' => 10,
        //     'nama' => '10',
        // ],
        // [
        //     'rt_id' => 11,
        //     'nama' => '11',
        // ],
        // [
        //     'rt_id' => 12,
        //     'nama' => '12',
        // ],
        // [
        //     'rt_id' => 13,
        //     'nama' => '13',
        // ],
        // ];

        $data = [
            ['rt_id' => 1, 'nama' => '01'],
            ['rt_id' => 2, 'nama' => '02'],
            ['rt_id' => 3, 'nama' => '03'],
            ['rt_id' => 4, 'nama' => '04'],
            ['rt_id' => 5, 'nama' => '05'],
        ];
        DB::table('rt')->insert($data);
    }
}
