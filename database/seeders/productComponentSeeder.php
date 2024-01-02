<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_components')->delete();
        DB::table('product_components')->insert([ 
            array(
                'id' =>  '1',
                'name' => 'Chair',
                'type_id' => '1',
            ),
            array(
                'id' => '2',
                'name' => 'Two Seaters',
                'type_id' => '1',
            ),
            array(
                'id' => '3',
                'name' => 'Three Seaters',
                'type' => '1',
            ),
            array(
                'id' => '4',
                'name' => 'Accessories & Coushins',
                'type_id' => '1',
            ),
            array(
                'id' => '5',
                'name' => 'Wardrobe',
                'type_id' => '2',
            ),array(
                'id' => '6',
                'name' => 'Wardrobe Front',
                'type_id' => '2',
            ),
            array(
                'id' => '7',
                'name' => 'Bed',
                'type_id' => '2',
            ),
            array(
                'id' => '8',
                'name' => 'Dresser',
                'type_id' => '2',
            ),
            array(
                'id' => '9',
                'name' => 'Stair',
                'type_id' => '2',
            ),
            array(
                'id' => '10',
                'name' => 'Puff',
                'type_id' => '2',
            ),
            array(
                'id' => '11',
                'name' => 'Mirror',
                'type_id' => '2',
            ),
            array(
                'id' => '12',
                'name' => 'Nightstand',
                'type_id' => '2',
            ),array(
                'id' => '13',
                'name' => 'Accessories',
                'type_id' => '2',
            )
            ,array(
                'id' => '14',
                'name' => 'Tall Display Unit',
                'type_id' => '3',
            )
            ,array(
                'id' => '15',
                'name' => 'Short Display Unit',
                'type_id' => '3',
            )
            ,array(
                'id' => '16',
                'name' => 'Mirror',
                'type_id' => '3',
            )
            ,array(
                'id' => '17',
                'name' => 'Dinning Accessories',
                'type_id' => '3',
            )
            ,array(
                'id' => '18',
                'name' => 'Dinning Table',
                'type_id' => '3',
            )
            ,array(
                'id' => '19',
                "name" => 'LCD',
                'type_id' => '4',
            )
            ,array(
                'id' => '20',
                'name' => 'MT',
                'type_id' => '4',
            )
            ,array(
                'id' => '21',
                'name' => 'BC',
                'type_id' => '4',
            )
            ,array(
                'id' => '22',
                'name' => 'SHR',
                'type_id' => '4',
            )
            ,array(
                'id' => '23',
                'name' => 'Chairs',
                'type_id' => '4',
            )
            ,array(
                'id' => '24',
                'name' => 'ST',
                'type_id' => '4',
            )
            ,array(
                'id' => '25',
                'name' => 'Mattres',
                'type_id' => '5',
            )
            ,array(
                'id' => '26',
                'name' => 'L Shape',
                'type_id' => '1',
            )
            ,array(
                'id' => '27',
                'name' => 'U Shape',
                'type_id' => '1',
            )
            ,array(
                'id' => '28',
                'name' => 'Sofa Bed',
                'type_id' => '1',
            ),array(
                'id' => '29',
                'name' => 'Table',
                'type_id' => '1',
            )
        ,array(
            'id' => '30',
            'name' => 'Table',
            'type_id' => '5',
        )
        ,array(
            'id' => '31',
            'name' => 'Swing',
            'type_id' => '5',
        )
        ,array(
            'id' => '32',
            'name' => 'Chair',
            'type_id' => '5',
        )
        ,array(
            'id' => '33',
            'name' => 'Accessories',
            'type_id' => '5',
        )
        ,array(
            'id' => '34',
            'name' => 'Athina',
            'type_id' => '7',
        )
        ,array(
            'id' => '35',
            'name' => 'Berlin',
            'type_id' => '7',
        )
        ,array(
            'id' => '36',
            'name' => 'Accessories',
            'type_id' => '7',
        )
        ,array(
            'id' => '37',
            'name' => 'Custimized Cabent ',
            'type_id' => '7',
        ) ,array(
            'id' => '38',
            'name' => 'Puff',
            'type_id' => '1',
        )    
       
    

        ]);

  }

}