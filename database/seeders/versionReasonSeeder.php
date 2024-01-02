<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class versionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
    {
        DB::table('version_reason')->delete();
        $data =['production difficulties','material is no longer available','cost control', 'wood color', 'fabric color','improve production'];
     foreach ($data as $row){
   DB::table('version_reason')->insert(['name'=> $row]);}
    }
    
    }

