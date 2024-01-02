<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Permissions')->delete();
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $arrayOfPermissionNames  =[
            'view distributors' ,'add distributor','edit distributor' ,'delete distributor',
            'view users','add user','edit user','delete user','view roles','add role','delete role','edit role',
            'view permissions' , 'add permission','delete permission','view activity log','view products','launch and cancel product',
            'add produst', 'edit product','delete product','add product details','edit product details',
            'delete product details',' add product price' , 'update product price' ,'add or remove to set',
            'view products versions','add product version','edit product version','delete product version',
            'sales','general settings', 'customers','reports',    
        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'admin'];
        });
    
        Permission::insert($permissions->toArray());  

      
    }
}
