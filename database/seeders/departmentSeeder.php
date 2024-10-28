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
          'Call Center',
          'Customer Service',
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
          'Research And Development',
          'Training And Development',
          'Recruitment',
          'Installation And Assembly',
          'Public Relations PR',
          'Design',
          'Warehouse',
          'Quality Control',
          'Quality Of Receivings',
          'Production',

      ];
      

     foreach ($data as $row){

    Department::create([
  'name'=>$row
    ]);
       }
    }
}
