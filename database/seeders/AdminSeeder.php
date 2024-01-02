<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('Admins')->delete();
        Admin::create([
            'name' => 'mina',
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678'),
            'company_id'=> 1,
        ])->assignRole('super admin');
    }
}
