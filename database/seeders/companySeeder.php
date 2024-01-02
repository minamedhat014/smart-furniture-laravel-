<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->delete();
        $data=['factory','betna','smart house ','ayshow ','smart trading','smart touch','long life','nashed','home star','darak','el bait',];
        foreach ($data as $row) {
            Company::create([
                  'name'=> $row
                ]);
    }
}
}