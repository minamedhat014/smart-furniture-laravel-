<?php

namespace Database\Seeders;

use App\Models\dropdownLists;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dropdownListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dropdown_lists')->delete();

        DB::table('dropdown_lists')->insert([ 
            array(
                'id' =>  '1',
                'name' => 'Materials',
                'model_namespace' => 'App\Models\Material',
            ),
            array(
              'id' =>  '2',
                'name' => 'Product sources',
                'model_namespace' => 'App\Models\productSource',
            ),
            array(
                'id' => '3',
                'name' => 'Products type',
                'model_namespace' => 'App\Models\productType',
            ),
            array(
                'id' => '4',
                'name' => 'Products parts',
                'model_namespace' => 'App\Models\Part',
            ),
            array(
                'id' => '5',
                'name' => 'Offers type',
                'model_namespace' => 'App\Models\offersType',
            ),array(
                'id' => '6',
                'name' => 'Departments',
                'model_namespace' => 'App\Models\departments',
            ),
            array(
                'id' => '7',
                'name' => 'Version reasons',
                'model_namespace' => 'App\Models\versionReason',
            ),
            array(
                'id' => '8',
                'name' => 'Banks',
                'model_namespace' => 'App\Models\banks',
            ),
            array(
                'id' => '9',
                'name' => 'Actions ',
                'model_namespace' => 'App\Models\Action',
            ),
            array(
                'id' => '10',
                'name' => 'customers type ',
                'model_namespace' => 'App\Models\CustomerType',
            ),
            array(
                'id' => '11',
                'name' => 'cities',
                'model_namespace' => 'App\Models\City',
            ),
            array(
                'id' => '12',
                'name' => 'order status',
                'model_namespace' => 'App\Models\orderStatus',
            ),
            array(
                'id' => '13',
                'name' => 'complaint status',
                'model_namespace' => 'App\Models\complaintStatus',
            ),
            array(
                'id' => '14',
                'name' => 'complaint Source',
                'model_namespace' => 'App\Models\complaintSource',
            ),
            array(
                'id' => '15',
                'name' => 'customer concern ',
                'model_namespace' => 'App\Models\CustomerConcern',
            ),
            array(
                'id' => '16',
                'name' => 'customer titles ',
                'model_namespace' => 'App\Models\CustomerTitle',
            ),

           

        ]);

            }
    }

