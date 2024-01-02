<?php

namespace Database\Seeders;

use App\Models\complaintStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class complaintStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaint_statuses')->delete();
        $data=['validation stage','sent to back office ',' appointment ','waitting for the frist shipment','address out of scope','order in production','repair cycle','pending from customer','closed',];
        foreach ($data as $row) {
            complaintStatus::create([
                  'name'=> $row
                ]);
    }
    }
}
