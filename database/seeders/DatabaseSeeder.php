<?php

namespace Database\Seeders;

 // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(RoleSeeder::class);
       $this->call(permissionSeeder::class);
       $this->call(sourceSeeder::class);
       $this->call(customerConcernSeeder::class);
       $this->call(TypeSeeder::class);
       $this->call(departmentSeeder::class);
       $this->call(warehouseSeeder::class);
       $this->call(ActivitySeeder::class);
       $this->call(ActionSeeder::class);
       $this->call(companySeeder::class);
       $this->call(AdminSeeder::class);
       $this->call(partSeeder::class);
       $this->call(productComponentSeeder::class);
       $this->call(materialSeeder::class);
       $this->call(versionReasonSeeder::class);
       $this->call(titleSeeder::class);
       $this->call(offertypeSeeder::class);
       $this->call(bankSeeder::class);
       $this->call(dropdownListsSeeder::class);
       $this->call(citySeeder::class);
       $this->call(customerTypeSeeder::class);
       $this->call(orderStatusSeeder::class);
       $this->call(complaintSourceSeeder::class);
       $this->call(complaintStatusSeeder::class);
       $this->call(mediaSeeder::class);
    }
}
