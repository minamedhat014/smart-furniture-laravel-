<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 2000;
        $totalRecords = 1000000;
        $batches = ceil($totalRecords / $batchSize);

        for ($i = 0; $i < $batches; $i++) {
            Product::factory()->count($batchSize)->create();
        }
    }
}
