<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class complaintExplantionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parts')->delete();
        DB::table('parts')->insert([
            
            array(
                'id' =>  '1',
                'name' => 'مسند',
                'type_id' => '1',
            ),
            array(
                'id' =>  '2',
                'name' => 'شاسيه',
                'type_id' => '1',
            ),
            array(
                'id' =>  '3',
                'name' => 'رجل',
                'type_id' => '1',
            ),
            array(
                'id' =>  '4',
                'name' => 'ظهر',
                'type_id' => '1',
            ),
            array(
                'id' =>  '5',
                'name' => 'كوشن',
                'type_id' => '1',
            ),
            array(
                'id' =>  '6',
                'name' => 'سكاكه',
                'type_id' => '1',
            ),
            array(
                'id' =>  '7',
                'name' => 'مجري',
                'type_id' => '1',
            ),
            array(
                'id' =>  '8',
                'name' => 'شماعه',
                'type_id' => '2',
            ),
            array(
                'id' =>  '9',
                'name' => 'تكايه',
                'type_id' => '2',
            ),
            array(
                'id' =>  '10',
                'name' => 'اضاءه',
                'type_id' => '2',
            ),
            array(
                'id' =>  '11',
                'name' => 'ليد',
                'type_id' => '2',
            ),
            array(
                'id' =>  '12',
                'name' => 'تنجيده',
                'type_id' => '2',
            ),
            array(
                'id' =>  '13',
                'name' => 'شباك سرير',
                'type_id' => '2',
            ),
            array(
                'id' =>  '14',
                'name' => 'جنب',
                'type' => '2',
            ),
            array(
                'id' =>  '15',
                'name' => 'قطوع',
                'type_id' => '2',
            ),array(
                'id' =>  '16',
                'name' => 'ضلفه',
                'type_id' => '2',
            ),
            array(
                'id' =>  '17',
                'name' => 'قرصه',
                'type_id' => '2',
            ),
            array(
                'id' =>  '18',
                'name' => 'قاعده',
                'type_id' => '2',
            ),array(
                'id' =>  '19',
                'name' => 'سقف',
                'type' => '2',
            ),
            array(
                'id' =>  '20',
                'name' => 'درج',
                'type_id' => '2',
            ),
            array(
                'id' =>  '21',
                'name' => 'سكلو',
                'type_id' => '2',
            ),
            array(
                'id' =>  '22',
                'name' => 'ريل',
                'type_id' => '2',
            ),
            array(
                'id' =>  '23',
                'name' => 'بستم',
                'type_id' => '7',
            ), array(
                'id' =>  '24',
                'name' => 'مجري',
                'type_id' => '7',
            ),
            array(
                'id' =>  '25',
                'name' => 'مفصله',
                'type_id' => '7',
            ),
            array(
                'id' =>  '26',
                'name' => 'علبه مطبقيه',
                'type_id' => '7',
            ),
            array(
                'id' =>  '27',
                'name' => 'علبه كورنر',
                'type_id' => '7',
            ),
            array(
                'id' =>  '28',
                'name' => 'علبه علويه',
                'type_id' => '7',
            ),
            array(
                'id' =>  '29',
                'name' => 'درج',
                'type_id' => '7',
            ),
            array(
                'id' =>  '30',
                'name' => 'علبه ادراج',
                'type_id' => '7',
            ), array(
                'id' =>  '31',
                'name' => 'تجليده',
                'type_id' => '7',
            ),

            array(
                'id' =>  '32',
                'name' => 'تكايه',
                'type_id' => '7',
            ),
            array(
                'id' =>  '33',
                'name' => 'علاقه',
                'type_id' => '7',
            ),
            array(
                'id' =>  '34',
                'name' => 'رجول',
                'type_id' => '7',
            ),
            array(
                'id' =>  '35',
                'name' => 'sp',
                'type_id' => '7',
            ),
            array(
                'id' =>  '36',
                'name' => 'm95',
                'type_id' => '7',
            ),
            array(
                'id' =>  '37',
                'name' => 'ضلفه خشب',
                'type_id' => '7',
            ),
            array(
                'id' =>  '38',
                'name' => 'ضلفه زجاج',
                'type_id' => '7',
            )
            
    ]);
    }
}
