<?php

namespace Database\Seeders;

use App\Models\productType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
            DB::table('product_types')->delete();
            $data =['living','bed room','dinning room', 'cash and carry','mattress','out door','kitchen','lights','accessories'];
         foreach ($data as $row){
    
        productType::create([
           'name'=>$row
        ]);
           }
        
       
    }
}
