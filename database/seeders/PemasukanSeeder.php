<?php

use Illuminate\Database\Seeder;
use App\Models\PemasukanModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PemasukanSeeder extends Seeder
{
    public function run()
    {
        // $users = [1]; // Tetapkan user ke 1
        // $rt = [1]; // Tetapkan rt ke 1
        // $deskripsi = ['bayar kas', 'pemasukan lain', 'pemasukan bulanan']; // Contoh deskripsi yang berbeda
        // $jumlah = [20000, 25000, 30000]; // Contoh jumlah yang berbeda

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

        $data =[
            [

            ]
            ];

            DB::table('pemasukan')->insert($data);
    }
}
