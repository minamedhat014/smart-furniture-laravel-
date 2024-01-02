<?php

namespace Database\Seeders;

use App\Models\complaintSource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class complaintSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaint_sources')->delete();
        $data=['installation technician ','cs technician ',' call center','branch sales ','facebook','phone',];
        foreach ($data as $row) {
            complaintSource::create([
                  'name'=> $row
                ]);
    }
    }
}
