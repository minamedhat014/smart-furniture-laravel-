<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class offertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('offers_type')->delete();
        $data =['extra discount','cash back','outlet','extra product','gift','extra service','get points','special day'];
     foreach ($data as $row){
   DB::table('offers_type')->insert(['name'=> $row]);}
    }
    }
