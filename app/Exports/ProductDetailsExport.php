<?php

namespace App\Exports;


use App\Models\productDetail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ProductDetailsExport implements FromQuery, WithHeadings ,WithMapping 
{

    private $soureExcel;
    private $statusExcel;
    private $startDate;
    private $endDate ;  
    public function __construct($soureExcel,$statusExcel,$startDate,$endDate)
    {
        $this->soureExcel = $soureExcel;
        $this->statusExcel =$statusExcel ;
        $this->startDate=$startDate;    
        $this->endDate= $endDate;   
    }


    public function query()
    {
       if($this->soureExcel && $this->statusExcel && $this->startDate && $this->endDate){ 
  
        return productDetail::query()->with('product','price')
        ->whereHas('product',function ($query){
            $query->where('source_id',$this->soureExcel)
            ->where('status',$this->statusExcel); })
            ->wherebetween('created_at',[$this->startDate ,$this->endDate]);
        }
    elseif( $this->startDate && $this->endDate){
            return productDetail::query()->with('product','price')
        ->whereHas('product',function ($query){
           $query ->wherebetween('created_at',[$this->startDate ,$this->endDate]);});
        }
      elseif($this->statusExcel){
     
        return productDetail::query()->with('product','price')
        ->whereHas('product',function ($query){
            $query->where('status',$this->statusExcel);
        });
      }
      elseif($this->soureExcel){
     
        return productDetail::query()->with('product','price')
        ->whereHas('product',function ($query){
            $query->where('source_id',$this->soureExcel);
        });
      }
      else{
        return productDetail::query()->with('product','price');
      }
       
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'type',
            'source',
            'descripation',
            'item materials',
            'fabric',
            'sponge',
            'sponge thickness',
            'available date',
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
            'dealler price',
            'enduser before discounnt',
            'normal discout',
            'special discout',
            'enduser after discounnt',
            'created by',
            'updated by',
            'created at',
            'updated at',

        ];
    }

    public function map($productDetail): array
    {
        return [
            $productDetail->id,
            $productDetail->product->name,
            $productDetail->product->type->name,
            $productDetail->product->source->source_name,
            $productDetail->product->descripation,
            $productDetail->product->item_material,
            $productDetail->product->fabric,
            $productDetail->product->sponge,
            $productDetail->product->sponge_thickness,
            $productDetail->product->available_date,
            $productDetail->product->divisablity,
            $productDetail->product->status,
            $productDetail->item_code,
            $productDetail->descripation,
            $productDetail->set,
            $productDetail->component_name,
            $productDetail->quantity,
            $productDetail->item_color,
            $productDetail->item_hieght,
            $productDetail->item_width,
            $productDetail->item_depth,
            $productDetail->price->dealler_price,
            $productDetail->price->end_before_discount,
            $productDetail->price->normal_discount,
            $productDetail->price->special_discount,
            $productDetail->price->end_after_discount,
            $productDetail->created_by,
            $productDetail->updated_by,
            $productDetail->created_at,
            $productDetail->updated_at,
        ];
    }
    
}
