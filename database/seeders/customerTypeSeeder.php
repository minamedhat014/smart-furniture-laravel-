<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use App\Models\CustomrType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class customerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_types')->delete();
        $data=['potential','silver','VIP', 'bussiness','gold','platinum'];

        foreach ($data as $row) {
            CustomerType::create([
              'name'=> $row
            ]);
        }
       
    }
}
