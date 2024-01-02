<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->delete();
        $data =['call center','installation team','Delivery team', 'facebook','Mail','phone','sales','admin','design','purchase','wharehouse','quality','hr','production','transportation','planning','accounting'];
     foreach ($data as $row){

    Department::create([
  'name'=>$row
    ]);
       }
    }
}
