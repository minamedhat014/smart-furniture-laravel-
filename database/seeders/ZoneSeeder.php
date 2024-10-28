<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('zones')->delete();
        $data = [
            'Al-Obour', 'Sherook City', 'Madinty', 'Rehab', '1st Settlement', '3rd Settlement', '5th Settlement',
            'Madint Nasr', 'Masr El Gidida', '6th of October', 'Sheikh Zayed City', 'Maadi', 'Giza', 'Haram',
            'New Capital', 'El Salam', '10th of Ramadan', 'El Nozha', 'Alexandria', 'Agami', 'North Coast', 
            'Al Ismailiya', 'Al-Zaqaziq', 'Abu Kabir', 'Abu Simbel City', 'Abu Zenima', 'Al Arish', 'Al-Minya',
            'Al Nubaria', 'Al-Qantara Gharb', 'Al Qusair City', 'Al-Rahmaniya', 'Al Shalaten', 'Al Tor', 'Aswan',
            'Asyut', 'Bahareya Oasis', 'Banha', 'Beni Suef', 'Borg El Arab Industrial Zone', 'Burg Al Burullous', 
            'New Cairo', 'Dahab', 'Damanhur', 'Damietta', 'Desouk', 'El Alamein', 'El Dakhla Oasis', 'El Farafra Oasis',
            'El Mahalla El Kubra', 'El Qoseir', 'Faiyum', 'Halyieb', 'Hurghada', 'Kafr Al-Sheikh', 'Kharga Oasis', 
            'Luxor', 'Menia', 'New Menia', 'New Valley', 'Mansoura', 'Marassi Resort', 'Marsa Alam', 'Marsa Matruh', 
            'Baltim', 'New Al Fayoum City', 'New Al Nobaria City', 'New Asyut', 'New Damietta', 'Nueiba', 'Port Said', 
            'Qantara Sharq', 'Qena', 'Ras Gharib', 'Ras Sudr', 'Sadat City', 'Safaga', 'Sallum', 'Sharm el-Sheikh', 
            'Shibin Al-Kom', 'Shubra al Khayma', 'Shubra Khit', 'Sidi Abdelrahman', 'Siwa Oasis', 'Sohag', 
            'St Catherine', 'Suez', 'Tanta'
        ];
        

        foreach ($data as $zone) {
    
       Zone::create([
        "name"=>$zone
       ]);
        }
    }
    }

