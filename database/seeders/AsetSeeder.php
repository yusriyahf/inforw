<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AsetModel;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AsetModel::create([
            'aset_id' => ''
        ]); 
    }
}
