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

        $arrayOfRolesNames  =[
            'super admin','admin' ,'super sales factory','sales factory' ,'super cs',
            'cs','super qulaity','quality','factory managers','sales','area manager','branch manager',
            'cs tech' , 'installation tech','production sw','production sai','purchase', 'accountant'
        ];

        $roles = collect($arrayOfRolesNames)->map(function ($roles) {
            return ['name' => $roles, 'guard_name' => 'admin'];
        });
    
    Role::insert($roles->toArray());  

      
    }

}
        
  

