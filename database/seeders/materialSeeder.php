<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class materialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->delete();
        $data=['MDF','chipboard','beech زان','pine عزيزي ','beech pine  موسكي','oak wood ارو','plywood  كونتر ','metal','steal','metal mechanism'];
        foreach ($data as $row) {
            Material::create([
                  'name'=> $row
                ]);
    }
}
}