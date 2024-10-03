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

        $data = [
          'Call center',
          'Customer service',
          'Sales',
          'Marketing',
          'IT',
          'HR',
          'Finance',
          'Accounting',
          'Operations',
          'Logistics',
          'Supply Chain',
          'Procurement',
          'Quality Assurance',
          'Research and Development',
          'Training and Development',
          'Recruitment',
          'Installation and Assembly',
          'Public Relations PR',
          'Design',
          'Warehouse',
          'Quality control',
          'Quality of receivings',
          'Production',

      ];
      

     foreach ($data as $row){

    Department::create([
  'name'=>$row
    ]);
       }
    }
}
