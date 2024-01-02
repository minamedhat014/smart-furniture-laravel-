<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class titleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('titles')->delete();
        $data =['sales','designer','branch manager', 'area manager'];
     foreach ($data as $row){
   DB::table('titles')->insert(['name'=> $row]);}
    }
}
