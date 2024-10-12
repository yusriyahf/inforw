<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AsetModel;
use Illuminate\Support\Facades\DB;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'aset_id' => '1',
                'nama' => 'Gedung',
                'deskripsi' => 'Gedung seluas 8x8m',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '1',
            ],
            [
                'aset_id' => '2',
                'nama' => 'Lapangan Tenis',
                'deskripsi' => 'Lapangan seluas 196 meter persegi',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '1',
            ],
            [
                'aset_id' => '3',
                'nama' => 'Perpustakaan',
                'deskripsi' => 'Perpustakaan desa dengan koleksi buku lengkap',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '2',
            ],
            [
                'aset_id' => '4',
                'nama' => 'Taman Bermain',
                'deskripsi' => 'Taman bermain anak-anak dengan berbagai fasilitas',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '2',
            ],
            [
                'aset_id' => '5',
                'nama' => 'Balai Desa',
                'deskripsi' => 'Balai Desa untuk pertemuan warga',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '3',
            ],
            [
                'aset_id' => '6',
                'nama' => 'Puskesmas',
                'deskripsi' => 'Pusat Kesehatan Masyarakat',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '3',
            ],
            [
                'aset_id' => '7',
                'nama' => 'Kantor RW',
                'deskripsi' => 'Kantor RW untuk administrasi',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '4',
            ],
            [
                'aset_id' => '8',
                'nama' => 'Gedung Serbaguna',
                'deskripsi' => 'Gedung serbaguna untuk acara warga',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '4',
            ],
            [
                'aset_id' => '9',
                'nama' => 'Kolam Renang',
                'deskripsi' => 'Kolam renang umum',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '5',
            ],
            [
                'aset_id' => '10',
                'nama' => 'Sarana Olahraga',
                'deskripsi' => 'Lapangan olahraga multifungsi',
                'status' => 'tersedia',
                'jenis' => 'tempat',
                'rt' => '5',
            ],
            // Aset pada RW
            [
                'aset_id' => '11',
                'nama' => 'Mobil Operasional',
                'deskripsi' => 'Mobil untuk operasional desa',
                'status' => 'tersedia',
                'jenis' => 'barang',
                'rt' => null,
            ],
            [
                'aset_id' => '12',
                'nama' => 'Motor Operasional',
                'deskripsi' => 'Motor untuk operasional desa',
                'status' => 'tersedia',
                'jenis' => 'barang',
                'rt' => null,
            ],
            [
                'aset_id' => '13',
                'nama' => 'Truk Sampah',
                'deskripsi' => 'Truk untuk pengangkutan sampah',
                'status' => 'tersedia',
                'jenis' => 'barang',
                'rt' => null,
            ],
            [
                'aset_id' => '14',
                'nama' => 'Alat Berat',
                'deskripsi' => 'Alat berat untuk pembangunan desa',
                'status' => 'tersedia',
                'jenis' => 'barang',
                'rt' => null,
            ],
            [
                'aset_id' => '15',
                'nama' => 'Generator Listrik',
                'deskripsi' => 'Generator untuk suplai listrik darurat',
                'status' => 'tersedia',
                'jenis' => 'barang',
                'rt' => null,
            ],
            
        ];
        DB::table('aset')->insert($data);
    }
}