<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_id' => 1,
                'nama' => 'Admin',
            ],
            [
                'role_id' => 2,
                'nama' => 'RW',
            ],
            [
                'role_id' => 3,
                'nama' => 'RT',
            ],
            [
                'role_id' => 4,
                'nama' => 'Warga',
            ],
        ];
        DB::table('roles')->insert($data);
    }
}
