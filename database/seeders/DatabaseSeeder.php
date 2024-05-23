<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rt;
use App\Models\User;
use App\Models\Roles;
use App\Models\Organisasi;
use Illuminate\Database\Seeder;
use App\Models\AnggotaOrganisasi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);







        // User::create([
        //     'nama' => 'Maulana Arya',
        //     'nik' => '2241720172',
        //     'kk' => '2241720178',
        //     'alamat' => 'jl. mbo aku lali',
        //     'rt' => '05',
        //     'status_pernikahan' => 'menikah',
        //     'status_keluarga' => 'anak',
        //     'role' => 'warga',
        //     'password' => bcrypt(12345),
        //     'tempat_lahir' => 'Malang',
        //     'tanggal_lahir' => '2000-01-01'

        // ]);
        // User::create([
        //     'nama' => 'Maulana Arya',
        //     'nik' => '224172',
        //     'kk' => '2241720178',
        //     'alamat' => 'jl. mbo aku lali',
        //     'rt' => '05',
        //     'status_pernikahan' => 'menikah',
        //     'status_keluarga' => 'anak',
        //     'role' => 'warga',
        //     'password' => bcrypt(12345),
        //     'tempat_lahir' => 'Malang',
        //     'tanggal_lahir' => '2000-01-01'

        // ]);
        // User::create([
        //     'nama' => 'Putri',
        //     'nik' => '2241720173',
        //     'kk' => '2241720178',
        //     'alamat' => 'jl. mbo aku lali',
        //     'rt' => '05',
        //     'status_pernikahan' => 'menikah',
        //     'status_keluarga' => 'anak',
        //     'role' => 'warga',
        //     'password' => bcrypt(12345),
        //     'tempat_lahir' => 'Malang',
        //     'tanggal_lahir' => '2000-01-01'

        // ]);
        // User::create([
        //     'nama' => 'Asti',
        //     'nik' => '2241720174',
        //     'kk' => '2241720178',
        //     'alamat' => 'jl. Kiwi',
        //     'rt' => '05',
        //     'status_pernikahan' => 'menikah',
        //     'status_keluarga' => 'anak',
        //     'role' => 'warga',
        //     'password' => bcrypt(12345),
        //     'tempat_lahir' => 'Malang',
        //     'tanggal_lahir' => '2000-01-01'

        // ]);

        Organisasi::create([
            'nama_organisasi' => 'Karang Taruna'
        ]);
        Organisasi::create([
            'nama_organisasi' => 'PKK'
        ]);
        Organisasi::create([
            'nama_organisasi' => 'Dasawisma'
        ]);

        AnggotaOrganisasi::create([
            'user_id' => '1',
            'organisasi_id' => '1'
        ]);
        AnggotaOrganisasi::create([
            'user_id' => '3',
            'organisasi_id' => '1'
        ]);
    }
}
