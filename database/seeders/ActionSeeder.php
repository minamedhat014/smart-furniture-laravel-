<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actions')->delete();
        $data=['تغير الجزء التالف','تغير المنتج بالكامل','ارتجاع المنتج','تغير اكسسوار','عمل صيانه وتربيط','سحب المنتج للاصلاح','توريد المنتج للعميل','توريداكسسوار','تم هندله العميل','تم الفك والتركيب','ارسال هديه او فاوتشر','تم عمل خصم','توريد الجزء التالف'];
        foreach ($data as $row) {
            action::create([
                  'name'=> $row
                ]);
            }
    }
}
