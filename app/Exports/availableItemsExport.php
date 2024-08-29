<?php

namespace App\Exports;


use App\Models\productDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class availableItemsExport implements FromQuery, WithHeadings ,WithMapping 
{


    // private $startDate;
    // private $endDate ;  

    // public function __construct($startDate,$endDate)
    // {
    //     $this->startDate=$startDate;    
    //     $this->endDate= $endDate;  
    // }


    public function query()
    { 


        return productDetail::query()->with('product', 'price', 'balance')
        ->whereHas('balance', function ($query) {
            $query->where('balance', '>', 0);
        });
    }
    

    public function headings(): array
    {
        return [
            'serial',
            'Name',
            'SKU',
            'type',
            'descripation',
            'item materials',
            'devisiability',
            'staus',
            'item code',
            'descripation',
            'set',
            'component name',
            'final price',
            'discounts',
            'avilable quantity',
            'consumption per week',
            'avilable date',
            'created by',
            'updated by',
            'created at',
            'updated at',

        ];
    }

    public function map($productDetail): array
    {

        $materials = [];
        $discounts =[];
    foreach ($productDetail->product->materials()->get() as $material) {
        $materials[] = $material->name;
    }

    foreach($productDetail->price->discounts as $discount){
        $discounts []= $discount->discount_percentage;
    }
        return [
            $productDetail->id,
            $productDetail->product?->name,
            $productDetail->product?->sku,
            $productDetail->product?->type->name,
            $productDetail->product?->descripation,
            $materials,
            $productDetail->product?->divisablity,
            $productDetail->product?->status,
            $productDetail->item_code,
            $productDetail->descripation,
            $productDetail->set,
            $productDetail->component_name,
            $productDetail->price?->final_price,
            $discounts,
            $productDetail->balance?->balance,
            $productDetail->balance?->consumption_rate_per_week,
            $productDetail->balance?->available_date,
            $productDetail->balance?->created_at,     
        ];
    }
    
}
