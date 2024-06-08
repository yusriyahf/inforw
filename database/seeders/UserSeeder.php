<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // [
            //     'user_id' => 1,
            //     'nik' => '2241720178',
            //     'nama' => 'Yusriyah Firjatullah',
            //     'password' => bcrypt('12345'),
            //     'rt_id' => '1',
            //     'role_id' => '1',
            //     'kartu_keluarga_id' => '1'

            // ],
            [
                'nik' => '2241720131',
                'nama' => 'Asti N.',
                'password' => bcrypt('12345'),
                'role' => '4',
                'keluarga' => '1'
            ],
            [
                'nik' => '2241720132',
                'nama' => 'Putri A.',
                'password' => bcrypt('12345'),
                'role' => '4',
                'keluarga' => '1'
            ],
            [
                'nik' => '2241720133',
                'nama' => 'Maulana A.',
                'password' => bcrypt('12345'),
                'role' => '4',
                'keluarga' => '1'
            ],
            [
                'nik' => '2241720134',
                'nama' => 'Dido I.',
                'password' => bcrypt('12345'),
                'role' => '4',
                'keluarga' => '1'
            ],
            
        ];
        DB::table('users')->insert($data);
    }
}
