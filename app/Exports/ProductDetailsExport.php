<?php

namespace App\Exports;


use App\Models\productDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ProductDetailsExport implements FromQuery, WithHeadings ,WithMapping 
{


    private $startDate;
    private $endDate ;  
    public function __construct($startDate,$endDate)
    {
        $this->startDate=$startDate;    
        $this->endDate= $endDate;  
    }


    public function query()
    { 

    if( $this->startDate && $this->endDate){
         return  
         productDetail::query()->with('product','price')
        ->whereHas('product',function ($query){
           $query ->wherebetween('created_at',[$this->startDate ,$this->endDate]);});
        }
    
      else{
        return productDetail::query()->with('product','price');
      }
       
    }

    public function headings(): array
    {
        return [
            'serial',
            'Name',
            'SKU',
            'type',
            'source',
            'descripation',
            'item materials',
            'fabric',
            'sponge',
            'sponge thickness',
            'divisablity',
            'staus',
            'item code',
            'descripation',
            'set',
            'component name',
            'quantity',
            'item color',
            'item hight',
            'item width',
            'item depth',
            'factory price',
            'final enduser price',
            'discounts',
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
            $productDetail->product?->source->name,
            $productDetail->product?->descripation,
            $materials,
            $productDetail->product?->fabric,
            $productDetail->product?->sponge,
            $productDetail->product?->sponge_thickness,
            $productDetail->product?->divisablity,
            $productDetail->product?->status,
            $productDetail->item_code,
            $productDetail->descripation,
            $productDetail->set,
            $productDetail->component_name,
            $productDetail->quantity,
            $productDetail->item_color,
            $productDetail->item_hieght,
            $productDetail->item_width,
            $productDetail->item_out_depth,
            $productDetail->price?->original_price,
            $productDetail->price?->final_price,
            $discounts,
            $productDetail->created_by,
            $productDetail->updated_by,
            $productDetail->created_at,
            $productDetail->updated_at,
        ];
    }
    
}
