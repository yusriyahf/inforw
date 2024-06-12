<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pengaduan_id' => '1',
                'judul' => 'Pengaduan Keamanan Lingkungan',
                'deskripsi' => 'Saya ingin melaporkan kejadian pencurian yang terjadi di sekitar area RW X pada malam hari kemarin. Mohon untuk peningkatan patroli keamanan di area tersebut. Terima kasih.',
                'jenis' => 'pengaduan',
                'user' => '8',
                'rt' => '1',

            ],
            [
                'pengaduan_id' => '2',
                'judul' => 'Pengaduan Kualitas Air Bersih',
                'deskripsi' => 'Saya ingin melaporkan adanya masalah kualitas air bersih di lingkungan RW X. Air dari kran tampak keruh dan tidak layak untuk dikonsumsi. Mohon untuk segera dilakukan pemeriksaan dan perbaikan. Terima kasih.',
                'jenis' => 'pengaduan',
                'user' => '22',
                'rt' => '1',

            ],
            [
                'pengaduan_id' => '3',
                'judul' => 'Saran Pemilahan Sampah',
                'deskripsi' => 'Saran untuk meningkatkan pemilahan sampah di RW X dengan mengganti tempat sampah umum menjadi berwarna berbeda untuk memudahkan warga dalam membuang sampah sesuai jenisnya.',
                'jenis' => 'saran',
                'user' => '35',
                'rt' => '1',

            ],

        ];
    }
}
