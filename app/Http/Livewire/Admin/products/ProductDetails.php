<?php

namespace App\http\Livewire\Admin\products;


use App\Models\Admin;
use App\Models\Price;
use App\Models\Product;
use Livewire\Component;
use App\Rules\Uppercase;
use Livewire\WithPagination;
use App\Models\productDetail;
use App\Models\ProductComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductPriceNotification;

class productDetails extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

public $search;
public $perpage =5;
public $sortfilter ='desc';
public $productID;
public $type;
public $user;
public $item_code;
public $descripation;
public $item_color;
public $item_material;
public $item_hieght;
public $item_width;
public $item_out_depth;
public $item_inner_depth;
public $component_name;
public $remarks;
public $quantity;
public $product_detail_id;
public $name;
public $selected =[];
public $dealler_price =0;
public $end_before_discount;
public $normal_discount=.15;
public $Vatt=0.14;
public $entered_margin =50 ;
public $dealler_margin;
public $special_discount_entered;
public $special_discount;
public $end_after_discount;


 public function mount(){
    $this->user= Auth::user()->name.Auth::user()->id; 
 }
 
 protected $listeners =[
    'delete',
 
 ];
 

protected function rules()
{
        return [ 
            'item_code' =>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:product_details,item_code,'.$this-> product_detail_id,
            'descripation' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'component_name' => 'required',
            'quantity'=>'required|int|max:6',
            'item_color' => 'required',
            'item_hieght'=>'required|numeric|max:350',
            'item_width'=>'required|numeric|max:400',
            'item_out_depth'=>'required|numeric|max:250',
            'item_inner_depth'=>'required|numeric|max:250',
            'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'dealler_price' => 'required|numeric|between:0,100000.99',
            'end_before_discount' => 'required|numeric|between:0,100000.99',
            'normal_discount'=>'required|numeric|between:0,99.99',
            'special_discount' => 'required|numeric|between:0,99.99',
            'end_after_discount'=>'required',
            'dealler_margin'=>'required|numeric|between:0,99.99',   
                    ];
}

 
public function updated($feilds)
{
    $this->validateOnly($feilds);
}

protected $queryString = ['search'];
public function closeModal()
    {
        $this->reset('dealler_margin','end_after_discount','special_discount','normal_discount','product_detail_id','end_before_discount','dealler_price','item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_out_depth','item_inner_depth','remarks');
    }

public function store(){
    DB::beginTransaction();
    try{
        $validatedData = $this->validate();
       $item= productDetail::create([
    'product_id'=>$this->productID,
     'item_code'=>$validatedData['item_code'],
     'descripation'=>$validatedData['descripation'],
     'component_name'=>$validatedData['component_name'],
     'item_color'=>$validatedData['item_color'],
     'quantity'=>$validatedData['quantity'],
     'item_hieght'=>$validatedData['item_hieght'],
     'item_width'=>$validatedData['item_width'],
     'item_out_depth'=>$validatedData['item_out_depth'],
     'item_inner_depth'=>$validatedData['item_inner_depth'],
     'remarks'=>$validatedData['remarks'],
     'created_by'=> $this->user,
        ]);

    $this->product_detail_id =$item->id;

     Price::create([
     'product_detail_id'=>$this->product_detail_id,
     'dealler_price'=>$validatedData['dealler_price'],
     'end_before_discount'=>$validatedData['end_before_discount'],
     'normal_discount'=>$validatedData['normal_discount'],
     'special_discount'=>$validatedData['special_discount'],
     'end_after_discount'=>$validatedData['end_after_discount'], 
     'dealler_margin'=>$validatedData['dealler_margin'],
     'created_by' => $this->user,
        ]);

        session()->flash('success','Done sucessfully' ); 
        $this->emit('closeModal');
        $this->reset('dealler_margin','end_after_discount','special_discount','normal_discount','product_detail_id','end_before_discount','dealler_price','item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_out_depth','item_inner_depth','remarks');
        $this->emit('closeModal');
      DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
        session()->flash('error',$e);
    }

 }

 public function edit($id){

    $edit= productDetail::with('price')->where('id',$id)->first();

    if($edit){
     $this->product_detail_id= $id;
     $this->item_code =$edit->item_code;
     $this->descripation=$edit->descripation;
     $this->component_name =$edit->component_name;
     $this->quantity =$edit->quantity;
     $this->item_color =$edit->item_color;
     $this->item_hieght =$edit->item_hieght;
     $this->item_width =$edit->item_width;
     $this->item_out_depth =$edit->item_out_depth;
     $this->item_inner_depth =$edit->item_inner_depth;
     $this->remarks =$edit->remarks;
     $this->dealler_price =$edit->price->dealler_price;
     $this->end_before_discount =$edit->price->end_before_discount;
     $this->special_discount =$edit->price->special_discount;
     $this->end_after_discount =$edit->price->end_after_discount;
     $this->dealler_margin =$edit->price->dealler_margin;
    }else{
     return redirect()->back();
 }
}


public function update(){
    try{
      DB::beginTransaction();
      $validatedData = $this->validate();
    $item= productDetail::FindOrFail($this->product_detail_id);
    $item->update([
         'item_code'=>$validatedData['item_code'],
         'descripation'=>$validatedData['descripation'],
         'component_name'=>$validatedData['component_name'],
         'item_color'=>$validatedData['item_color'],
         'quantity'=>$validatedData['quantity'],
         'item_hieght'=>$validatedData['item_hieght'],
         'item_width'=>$validatedData['item_width'],
         'item_out_depth'=>$validatedData['item_out_depth'],
         'item_inner_depth'=>$validatedData['item_inner_depth'],
         'remarks'=>$validatedData['remarks'],
         'updated_by'=> $this->user,
      ]);

      $price=Price::where('product_detail_id',$this-> product_detail_id)->first();
      $price->update([
        'product_detail_id'=>$this->product_detail_id,
        'dealler_price'=>$validatedData['dealler_price'],
        'end_before_discount'=>$validatedData['end_before_discount'],
        'normal_discount'=>$validatedData['normal_discount'],
        'special_discount'=>$validatedData['special_discount'],
        'end_after_discount'=>$validatedData['end_after_discount'], 
        'dealler_margin'=>$validatedData['dealler_margin'],
        'updated_by' => $this->user,
           ]);
           $product_id =productDetail::where('id',$this->product_detail_id)->value('product_id');
           $product=Product::findOrFail($product_id);
           $user= Admin::all(['id','name']);
           if($product->status==2){
           Notification::send($user, new ProductPriceNotification($product));
           }
           $this->reset('dealler_margin','end_after_discount','special_discount','normal_discount','product_detail_id','end_before_discount','dealler_price','item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_out_depth','item_inner_depth','remarks');
      session()->flash('success','done successfully');
      $this->emit('closeModal');
      DB::commit();  
     }catch(\Exception $e){
         DB::rollBack();
         session()->flash('error',$e);
     }  
     }
 
      
 

 public function deleteID(int $id){
    $this->product_detail_id= $id;
    }


   public function removeSet(int $id){
    try{
        productDetail::FindOrFail($id)->update([
            'set'=>0,
        ]);
        session()->flash('success','done successfully');
       }catch(\Exception $e){
        session()->flash('error',$e);
       }
        }
    

     public function AddToSet(int $id){
    try{
        productDetail::FindOrFail($id)->update([
            'set'=>1,
        ]);
        session()->flash('success','done successfully');
       }catch(\Exception $e){
        session()->flash('error',$e);
       }
            }
        


    public function delete(){

        try{
         productDetail::FindOrFail($this->product_detail_id)->delete();
         session()->flash('success','done successfully');
        }catch(\Exception $e){
            session()->flash('error',$e);
        }
    }

 
  
    public function render()
    {
        $id=$this->productID; 
        $data= productDetail::with('product','price')->where('product_id',$id)->get();
        $this->selected= productDetail::where('product_id',$id)->where('set',1)->get();
        $componentNames=ProductComponent::where('type_id',$this->type)->get();

        $this->special_discount= $this->special_discount_entered /100;
        $this->dealler_margin= $this->entered_margin /100;
        $this->end_before_discount =round( $this->dealler_price + $this->dealler_price * $this->dealler_margin +$this->dealler_price * $this->Vatt-
        $this->special_discount * $this->end_before_discount,2);
        $this->end_after_discount = round($this->end_before_discount -$this->end_before_discount * $this->normal_discount -$this->special_discount * $this->end_before_discount,2);

        return view('livewire.Admin.products.product-details',compact('id','componentNames','data'));
    }
}
