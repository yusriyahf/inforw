<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'pengumuman_id' => '1',
                'judul' => 'Pengumuman Rapat RW',
                'deskripsi' => 'Diberitahukan kepada seluruh warga RW bahwa akan diadakan rapat pada hari Minggu, tanggal 15 Juni 2024 pukul 08.00 WIB di Balai RW. Harap semua warga hadir untuk membahas hal-hal penting terkait lingkungan dan keamanan. Terima kasih.',
                'user' => '2',
                'rw' => '1',
            ],
            [
                'pengumuman_id' => '2',
                'judul' => 'Pemeliharaan Lingkungan RW',
                'deskripsi' => 'Kepada seluruh warga RW, kami menghimbau untuk menjaga kebersihan lingkungan masing-masing. Mohon kerjasama dalam membuang sampah pada tempatnya dan menjaga keindahan RW kita bersama. Terima kasih atas perhatiannya.',
                'user' => '2',
                'rw' => '1',
            ],
            [
                'pengumuman_id' => '3',
                'judul' => 'Penutupan Sementara Lapangan Tenis',
                'deskripsi' => 'Kepada seluruh warga RW, kami informasikan bahwa lapangan tenis akan ditutup sementara untuk perawatan dan renovasi. Penutupan akan dimulai dari tanggal 15 Juni sampai dengan 30 Juni 2024. Kami mohon maaf atas ketidaknyamanan ini dan terima kasih atas pengertian dan kerjasamanya.',
                'user' => '2',
                'rw' => '1',
            ],
        ];
    }
}
