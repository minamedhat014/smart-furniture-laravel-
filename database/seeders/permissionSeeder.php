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

            //settings permissions
            'view system list',
            'write system list','view activity log',
            'view users','write user',
            // showrooms permission
            'view distributors' ,'write distributor' ,
            'view showrooms','write showroom','showroom staff','showroom products',
           // products permissions 
            'view products','write product','export products',
            'rate products','print product layout','view product source',
            'view dealler prices',
            // product updates 
            'view products versions','write product version',
            //available items 
           'view available items','upload avialable','download available','write avilable',
            // offers 
            'view offers' ,'write offer',
            'run discount',
             //installment offers
            'write installment' ,'view installments',
            'sales','general settings', 'customers','reports',
            //customers 
            'view customers','write customer',
            // orders 
            'view orders', 'write order',
           

        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'admin'];
        });
    
        Permission::insert($permissions->toArray());  

      
    }
}
