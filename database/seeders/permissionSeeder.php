<?php

namespace Database\Seeders;

use App\Models\Department;
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
        
        $department = Department::all();
        $arrayOfPermissionNames  =[

            //settings permissions
            'view settings' , 'view system list',
            'write system list','view activity log',
            'view users','write user',
            //departments
           
          
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
            'view orders', 'write order','reopen order','return order',

           
  //procedures
  'view policies', 
  'view Call Center policy',
  'view Sales policy',
  'view Customer Service policy',
 'view Marketing policy',
 'view IT policy',
 'view HR policy',
 'view Finance policy',
 'view Accounting policy',
 'view Operations policy',
 'view Logistics policy',
 'view Supply Chain policy',
 'view Procurement policy',
 'view Quality Assurance policy',
 'view Research And Development policy',
 'view Training And Development policy',
 'view Recruitment policy',
 'view Installation And Assembly policy',
 'view Public Relations PR policy',
 'view Design policy',
 'view Warehouse policy',
 'view Quality Control policy',
 'view Quality Of Receivings policy',
 'view Production policy',
   'write policy','approve policy',

        ];

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'admin'];
        });
    
        Permission::insert($permissions->toArray());  

      
    }
}
