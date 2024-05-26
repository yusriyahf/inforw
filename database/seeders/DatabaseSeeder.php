<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Rt;
use App\Models\User;
use App\Models\Roles;
use App\Models\RtModel;
use App\Models\RwModel;
use App\Models\Organisasi;
use App\Models\RolesModel;
use App\Models\KeluargaModel;
use Illuminate\Database\Seeder;
use App\Models\AnggotaOrganisasi;
use App\Models\AsetModel;
use App\Models\PengumumanModel;

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



        RolesModel::create([
            'role_id' => '1',
            'nama' => 'admin',
        ]);
        RolesModel::create([
            'role_id' => '2',
            'nama' => 'rw',
        ]);
        RolesModel::create([
            'role_id' => '3',
            'nama' => 'rt',
        ]);
        RolesModel::create([
            'role_id' => '4',
            'nama' => 'warga',
        ]);

        RtModel::create([
            'rt_id' => '1',
            'nama' => '01'
        ]);
        RtModel::create([
            'rt_id' => '2',
            'nama' => '02'
        ]);
        RtModel::create([
            'rt_id' => '3',
            'nama' => '03'
        ]);
        RtModel::create([
            'rt_id' => '4',
            'nama' => '04'
        ]);
        RwModel::create([
            'rw_id' => '1',
            'nama' => '13'
        ]);

        KeluargaModel::create([
            'keluarga_id' => '1',
            'no_kk' => '357304',
            'kepala_keluarga' => 'Park Hyung Seok',
            'rw' => '1',
            'rt' => '1'
        ]);

        User::create([
            'user_id' => '1',
            'nik' => 'admin',
            'nama' => 'admin',
            'password' => bcrypt('admin'),
            'role' => '1',
        ]);

        User::create([
            'user_id' => '2',
            'nik' => '2241720171',
            'nama' => 'Kim Gimyung',
            'password' => bcrypt('12345'),
            'role' => '4',
            'keluarga' => '1'
        ]);
        User::create([
            'user_id' => '3',
            'nik' => '2241720172',
            'nama' => 'Zin Lee',
            'password' => bcrypt('12345'),
            'role' => '2',
            'keluarga' => '1'
        ]);
        User::create([
            'user_id' => '4',
            'nik' => '2241720173',
            'nama' => 'Vasko',
            'password' => bcrypt('12345'),
            'role' => '3',
            'keluarga' => '1'
        ]);
        User::create([
            'user_id' => '5',
            'nik' => '2241720178',
            'nama' => 'Yusriyah Firjatullah',
            'password' => bcrypt('12345'),
            'role' => '4',
            'keluarga' => '1'
        ]);



        RtModel::where('rt_id', '1')->update([
            'ketua' => '2',
            'sekretaris' => '3',
            'bendahara' => '1',
        ]);
        RtModel::where('rt_id', '2')->update([
            'ketua' => '2',
            'sekretaris' => '3',
            'bendahara' => '1',
        ]);

        RwModel::where('rw_id', '1')->update([
            'ketua' => '1',
            'sekretaris' => '2',
            'bendahara' => '3',
        ]);

        PengumumanModel::create([
            'pengumuman_id' => '1',
            'judul' => 'Beso Kerja Bakti',
            'deskripsi' => 'Semua bapak bapak wajib mengikuti jika tidak akan dikenakan sangsi yang sangat berat lo',
            'tanggal' =>  now()->toDateString(),
            'user' => '1',
            'rt' => '1'
        ]);

        PengumumanModel::create([
            'pengumuman_id' => '2',
            'judul' => 'Ada warga baru',
            'deskripsi' => 'Semuanya mari kita beri sambutan yang meriah kepada pak martis',
            'tanggal' =>  now()->toDateString(),
            'user' => '1',
            'rt' => '1'
        ]);

        AsetModel::create([
            'aset_id' => '1',
            'nama' => 'Lapangan',
            'deskripsi' => 'lapangan dengan luas 3x3m',
            'status' =>  'tersedia',
            'jenis' => 'tempat',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '2',
            'nama' => 'Gedung',
            'deskripsi' => 'Gedung dengan 3 lantai',
            'status' =>  'tersedia',
            'jenis' => 'tempat',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '3',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);

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

        // Organisasi::create([
        //     'nama_organisasi' => 'Karang Taruna'
        // ]);
        // Organisasi::create([
        //     'nama_organisasi' => 'PKK'
        // ]);
        // Organisasi::create([
        //     'nama_organisasi' => 'Dasawisma'
        // ]);

        // AnggotaOrganisasi::create([
        //     'user_id' => '1',
        //     'organisasi_id' => '1'
        // ]);
        // AnggotaOrganisasi::create([
        //     'user_id' => '3',
        //     'organisasi_id' => '1'
        // ]);
    }
}
