<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
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
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;
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
        RolesModel::create([
            'role_id' => '5',
            'nama' => 'sekretaris',
        ]);
        RolesModel::create([
            'role_id' => '6',
            'nama' => 'bendahara',
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

        KeluargaModel::where('keluarga_id', '1')->update([
            'kepala_keluarga' => '1'
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
        User::create([
            'user_id' => '6',
            'nik' => '2241720179',
            'nama' => 'Sung Jin Woo',
            'password' => bcrypt('12345'),
            'role' => '6',
            'keluarga' => '1'
        ]);
        User::create([
            'user_id' => '7',
            'nik' => '2241720180',
            'nama' => 'Cha Hae In',
            'password' => bcrypt('12345'),
            'role' => '5',
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
            'user' => '1',
            'rt' => '1'
        ]);

        PengumumanModel::create([
            'pengumuman_id' => '2',
            'judul' => 'Ada warga baru',
            'deskripsi' => 'Semuanya mari kita beri sambutan yang meriah kepada pak martis',
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
        AsetModel::create([
            'aset_id' => '4',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '5',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '6',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '7',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '8',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '9',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '10',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '11',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);
        AsetModel::create([
            'aset_id' => '12',
            'nama' => 'Sound System',
            'deskripsi' => 'Suara setara auman singa',
            'status' =>  'tersedia',
            'jenis' => 'barang',
            'rw' => '1',
            'rt' => '1',
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '1',
            'jumlah' => '1250000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '01', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '2',
            'jumlah' => '750000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '01', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '3',
            'jumlah' => '1100000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '02', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '4',
            'jumlah' => '950000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '02', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '5',
            'jumlah' => '1050000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '03', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '6',
            'jumlah' => '750000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '03', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '7',
            'jumlah' => '1150000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '04', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '8',
            'jumlah' => '800000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '04', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '9',
            'jumlah' => '1500000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '05', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '10',
            'jumlah' => '852000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '05', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '11',
            'jumlah' => '1565000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '06', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '12',
            'jumlah' => '664000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '06', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '13',
            'jumlah' => '1655000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '07', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '14',
            'jumlah' => '754000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '07', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '15',
            'jumlah' => '1490000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '08', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '16',
            'jumlah' => '800000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '08', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '17',
            'jumlah' => '1500000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '09', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '18',
            'jumlah' => '750000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '09', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '19',
            'jumlah' => '1500000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '10', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '20',
            'jumlah' => '750000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '10', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '21',
            'jumlah' => '1295000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '11', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '22',
            'jumlah' => '800000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '11', '20')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '23',
            'jumlah' => '1500000',
            'deskripsi' => 'Iuran keamanan',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '12', '07')
        ]);

        PemasukanModel::create([
            'pemasukan_id' => '24',
            'jumlah' => '750000',
            'deskripsi' => 'Iuran sampah',
            'user' => '3',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '12', '20')
        ]);

        PengeluaranModel::create([
            'pengeluaran_id' => '1',
            'jumlah' => '20000',
            'deskripsi' => 'Beli kursi',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '1', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '2',
            'jumlah' => '40000',
            'deskripsi' => 'Beli meja',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '2', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '3',
            'jumlah' => '10000',
            'deskripsi' => 'Beli pintu',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '3', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '4',
            'jumlah' => '89000',
            'deskripsi' => 'Beli pintu',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '4', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '5',
            'jumlah' => '240000',
            'deskripsi' => 'Beli Sound system',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '5', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '6',
            'jumlah' => '640000',
            'deskripsi' => 'Beli Truk',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '6', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '7',
            'jumlah' => '20000',
            'deskripsi' => 'Beli spidol',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '7', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '8',
            'jumlah' => '65000',
            'deskripsi' => 'Beli tas',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '8', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '9',
            'jumlah' => '100000',
            'deskripsi' => 'Alat alat lomba',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '9', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '10',
            'jumlah' => '45000',
            'deskripsi' => 'Cat kampung',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '10', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '11',
            'jumlah' => '5000',
            'deskripsi' => 'Pulpen',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '11', '20')
        ]);
        PengeluaranModel::create([
            'pengeluaran_id' => '12',
            'jumlah' => '1000',
            'deskripsi' => 'entah',
            'rt' => '1',
            'tanggal' => Carbon::create('2024', '12', '20')
        ]);


        // $users = [1]; // Tetapkan user ke 1
        // $rt = [1]; // Tetapkan rt ke 1
        // $deskripsi = ['bayar kas', 'pemasukan lain', 'pemasukan bulanan']; // Contoh deskripsi yang berbeda
        // $jumlah = [500, 10000, 20000, 25000, 30000, 35000, 40000, 50000]; // Contoh jumlah yang berbeda

        // // Looping untuk setiap bulan
        // for ($bulan = 1; $bulan <= 12; $bulan++) {
        //     // Tetapkan tanggal awal dan akhir untuk setiap bulan
        //     $tanggal_awal = date('Y-m-01', strtotime(date('Y') . '-' . $bulan . '-01'));
        //     $tanggal_akhir = date('Y-m-t', strtotime($tanggal_awal));

        //     // Looping untuk setiap hari dalam bulan
        //     for ($tanggal = $tanggal_awal; $tanggal <= $tanggal_akhir; $tanggal = date('Y-m-d', strtotime($tanggal . ' +1 day'))) {
        //         // Pilih acak deskripsi dan jumlah
        //         $deskripsi_random = $deskripsi[array_rand($deskripsi)];
        //         $jumlah_random = $jumlah[array_rand($jumlah)];

        //         // Pilih acak user dan rt (tetap 1)
        //         $user_random = $users[array_rand($users)];
        //         $rt_random = $rt[array_rand($rt)];

        //         // Buat data pemasukan
        //         PemasukanModel::create([
        //             'jumlah' => $jumlah_random,
        //             'deskripsi' => $deskripsi_random,
        //             'user' => $user_random,
        //             'rt' => $rt_random,
        //             'tanggal' => $tanggal,
        //         ]);
        //     }
        // }

        // PemasukanModel::create([
        //     'pemasukan_id' => '1',
        //     'jumlah' => 20000,
        //     'deskripsi' => 'bayar kas',
        //     'user' => '1',
        //     'rt' => '1',
        //     'tanggal' => '',

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

        $this->call(BansosSeeder::class);
    }
}
