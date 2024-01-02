<?php

namespace Database\Seeders;

use App\Models\MediaActivity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class mediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media_activities')->delete();
        $data=['Social media','show room','old customer ','out door ','TV','radio','website','event','fair'];
        foreach ($data as $row) {
            MediaActivity::create([
                  'name'=> $row
                ]);
    }
}
}
