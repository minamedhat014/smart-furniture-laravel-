<?php

namespace Database\Seeders;

use App\Models\orderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class orderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->delete();
        $data=['open','confirmed','sent to fcatory','ready for factory','sent back to branch','delivered only','deliverd and installed','canceled','returned','deliverd with complaint','installed with complaint'];
        foreach ($data as $row) {
            orderStatus::create([
                  'name'=> $row
                ]);
    }
    }
}
