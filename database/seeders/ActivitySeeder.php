<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activitities')->delete();

        DB::table('activitities')->insert([
            
                array(
                    'id' =>  '1',
                    'name' => 'show room',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '2',
                    'name' => 'Confirmation',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '3',
                    'name' => 'Products',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '4',
                    'name' => 'follow up order',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '5',
                    'name' => 'Management',
                    'type' => 'inquiry',
                ),array(
                    'id' => '6',
                    'name' => 'Transfer, installation and configuration',
                    'type' => 'request',
                ),
                array(
                    'id' => '7',
                    'name' => 'Installment',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '8',
                    'name' => 'Offers',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '9',
                    'name' => 'Specifications',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '10',
                    'name' => 'Prices',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '11',
                    'name' => 'Exhibition',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '12',
                    'name' => 'Potential Customer',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '13',
                    'name' => 'follow up',
                    'type' => 'complaint',
                ),
                array(
                    'id' => '14',
                    'name' => 'Maintenance',
                    'type' => 'inquiry',
                ),
                array(
                    'id' => '15',
                    'name' => 'Product',
                    'type' => 'complaint',
                ),
                array(
                    'id' => '16',
                    'name' => 'Worng Delivery',
                    'type' => 'complaint',
                ),
                array(
                    'id' => '17',
                    'name' => 'Bad Installation',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '18',
                    'name' => 'Company Car',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '19',
                    'name' => 'Sales Attitude',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '20',
                    'name' => 'Driver',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '21',
                    'name' => 'Delay from Betna CS',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '22',
                    'name' => 'Delay from backoffice CS',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '23',
                    'name' => 'Delivery and installation delay',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '24',
                    'name' => 'Esclation',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '25',
                    'name' => ' Lack of Follow up',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '26',
                    'name' => 'Wrong Design',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '27',
                    'name' => 'Ethic Violation',
                    'type' => 'Administrative complaint',
                ),
                array(
                    'id' => '28',
                    'name' => 'Lack of Commitment',
                    'type' => 'Administrative complaint',
                ),
               
        ]);
       
    }
}
