<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class warehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('warehouses')->delete();
      $data =['WFG','WNC','WDF','Outlet','Showroom'];
      foreach($data as $row){
        Warehouse::create([
        'name'=>$row
        ]);
      }
    }
}
