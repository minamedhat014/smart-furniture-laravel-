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
        $data=['open','waiting for Payment','Confirmed','sent to fcatory','ready for dispatch','delivered','Canceled','Returned','deliverd with complaint','delivered without installation ',];
        foreach ($data as $row) {
            orderStatus::create([
                  'name'=> $row
                ]);
    }
    }
}
