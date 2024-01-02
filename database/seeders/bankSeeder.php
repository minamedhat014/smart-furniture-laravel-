<?php

namespace Database\Seeders;

use App\Models\banks;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class bankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('banks')->delete();
        $data=['ADIB','CIP','MISR ','MASHREQ ','BDC','NBE','FAB','NBD','NBK','AUB','HSBC','ai BANK','SAIB','VALUE','AMAN','CONTACT'];
        foreach ($data as $row) {
            banks::create([
                  'name'=> $row
                ]);
    }
    }
}
