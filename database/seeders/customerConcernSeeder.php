<?php

namespace Database\Seeders;

use App\Models\CustomerConcern;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class customerConcernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_concern')->delete();
        $data=['production','finish','wood quality','accessories qulaity','time commitment','sales attitide','call center attittude','customer care attittude','prices','design and colors','no concern'];

        foreach ($data as $row) {
            CustomerConcern::create([
              'name'=> $row
            ]);
        }
       
    }
}
