<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfRolesNames = [
            'super admin',
            'admin',
            'super sales factory',
            'sales factory',
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
            'Public Relations PR',
            'Design',
            'Warehouse',
            'Quality control',
            'Quality of receivings',
            'Production',
            'super quality',
            'factory managers',
            'Installation and Assembly',
            'area manager',
            'branch manager',
            'cs tech', 
            'installation tech',
            'production sw',
            'production sai',
        
        ];
           
        

        $roles = collect($arrayOfRolesNames)->map(function ($roles) {
            return ['name' => $roles, 'guard_name' => 'admin'];
        });
    
    Role::insert($roles->toArray());  

      
    }

}
        
  

