<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateRwRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'rt_id' => 1,
                'ketua' => 7,
                'sekretaris' => 9,
                'bendahara' => 8
            ],
            [
                'rt_id' => 2,
                'ketua' => 3,
                'sekretaris' => 5,
                'bendahara' => 6
            ],
            [
                'rt_id' => 3,
                'ketua' => 10,
                'sekretaris' => 11,
                'bendahara' => 12
            ],
            [
                'rt_id' => 4,
                'ketua' => 13,
                'sekretaris' => 14,
                'bendahara' => 15
            ],
            [
                'rt_id' => 5,
                'ketua' => 16,
                'sekretaris' => 17,
                'bendahara' => 18
            ],
        ];

        foreach ($data as $item) {
            DB::table('rt')
                ->where('rt_id', $item['rt_id'])
                ->update([
                    'ketua' => $item['ketua'],
                    'sekretaris' => $item['sekretaris'],
                    'bendahara' => $item['bendahara']
                ]);
        }

        $rw = [
            'rw_id' => 1,
            'ketua'=>2,
            'sekretaris'=>24,
            'bendahara'=>22
        ];

        DB::table('rw')
            ->where('rw_id', $rw['rw_id'])
            ->update([
                'ketua' => $rw['ketua'],
                'sekretaris' => $rw['sekretaris'],
                'bendahara' => $rw['bendahara'],
            ]);
    }
}
