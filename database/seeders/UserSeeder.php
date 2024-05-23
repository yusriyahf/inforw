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
            [
                'user_id' => 1,
                'nik' => '2241720178',
                'nama' => 'Yusriyah Firjatullah',
                'password' => bcrypt('12345'),
                'rt_id' => '1',
                'role_id' => '1'
            ],
            [
                'user_id' => 2,
                'nik' => '2241720171',
                'nama' => 'Asti Nurin',
                'password' => bcrypt('12345'),
                'rt_id' => '2',
                'role_id' => '2'
            ],
            [
                'user_id' => 3,
                'nik' => '2241720172',
                'nama' => 'Putri Ayu',
                'password' => bcrypt('12345'),
                'rt_id' => '3',
                'role_id' => '3'
            ],
            [
                'user_id' => 4,
                'nik' => '2241720173',
                'nama' => 'Maulita',
                'password' => bcrypt('12345'),
                'rt_id' => '4',
                'role_id' => '4'
            ],
        ];
        DB::table('users')->insert($data);
    }
}
