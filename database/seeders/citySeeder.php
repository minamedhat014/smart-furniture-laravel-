<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->delete();
        $data = [
            'cairo','6th of October','Abu Kabir','Abu Simbel City','Abu Zenima','Al Arish','Alexandria',
            'Al Ismailiya','Al-Minya','Al Nubaria','Al-Obour','Al-Qantara Gharb','Al Qusair City','Al-Rahmaniya',
            'Al Shalaten','Al Tor','Al-Zaqaziq','Aswan','Asyut','Bahareya Oasis','Banha','Beni Suef','Borg El Arab Industrial Zone',
            'Burg Al Burullous','new cairo','Dahab','Damanhur','Damietta','Desouk','El Alamein','El Dakhla Oasis','El Farafra Oasis',
            'El Mahalla El Kubra','El Qoseir','Faiyum','Giza','Halyieb','Hurghada','Kafr Al-Sheikh','Kharga Oasis','Luxor','Madinaty',
            'menia','new menia','new vally','new capital','el salam','madint nasr','rehab','10th of ramdan','maadi','El nozha','masr el gdida',
            'Mansoura','Marassi resort','Marsa Alam','Marsa Matruh','Baltim','New Al Fayoum City','New Al Nobaria City','New Asyut','New Damietta',
            'Nueiba','Port Said','Qantara Sharq','Qena','Ras Gharib','Ras Sudr','Sadat City','Safaga','Sallum','Sharm el-Sheikh','Sheikh Zayed City',
            'Sherook city','Shibin Al-Kom','Shubra al Khayma','Shubra Khit','Sidi Abdelrahman','Siwa Oasis','Sohag','St Catherine','Suez','Tanta'
        ];

        foreach ($data as $city) {
    
       City::create([
        "name"=>$city
       ]);
        }
    }
    }

