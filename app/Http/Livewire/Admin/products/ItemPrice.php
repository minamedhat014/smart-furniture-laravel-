<?php

namespace App\Http\Livewire\Admin\Products;

use Exception;
use App\Models\Admin;
use App\Models\Price;
use App\Models\Product;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductPriceNotification;
use Livewire\Component;

class ItemPrice extends Component
{
    public $product_detail_id;
    public $dealler_price =0;
    public $end_before_discount;
    public $normal_discount =.15;
    public $Vatt=0.14;
    public $dealler_margin =.5;
    public $special_discount_entered;
    public $special_discount;
    public $end_after_discount;
    public $user;
    
    
    
       public function mount()
             {
                $this->user= Auth::user()->name.Auth::user()->id; 
                
             }
   
    protected $listeners =[
        'gettingitemID',
     
     ];
    
     public function gettingitemID($id){
        $this->product_detail_id =$id;
     }
    
    
    protected function rules()
    {
            return [ 
                'product_detail_id' => 'required',
                'dealler_price' => 'required|numeric|between:0,100000.99',
                'end_before_discount' => 'required|numeric|between:0,100000.99',
                'normal_discount'=>'required|numeric|between:0,99.99',
                'special_discount' => 'required|numeric|between:0,99.99',
                'end_after_discount'=>'required',
                'dealler_margin'=>'required|numeric|between:0,99.99',
                        ];
    }
    
    
    public function closeModal()
        {
         $this->reset();
        }
        
    public function store(){
       try{
          Price::where('product_detail_id', $this->product_detail_id)->delete();
            $validatedData = $this->validate();
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
            $product_id =productDetail::where('id',$this->product_detail_id)->value('product_id');
            $product=Product::findOrFail($product_id);
            $user= Admin::all(['id','name']);
            if($product->status==2){
            Notification::send($user, new ProductPriceNotification($product));
            }
            $this->reset();
          }catch(\Exception $e){
             DB::rollBack();
             session()->flash('error', $e ); 
         }
     }
    
    
    
     
      
        public function render()
        {
          $this->special_discount= $this->special_discount_entered /100;
         $this->end_before_discount = $this->dealler_price + $this->dealler_price * $this->dealler_margin +$this->dealler_price * $this->Vatt;
         $this->special_discount * $this->end_before_discount;
         $this->end_after_discount = $this->end_before_discount -$this->end_before_discount * $this->normal_discount -$this->special_discount * $this->end_before_discount;
            return view('livewire.admin.products.item-price');
        }
    }
    
