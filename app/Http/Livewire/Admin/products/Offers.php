<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\offer;
use Livewire\Component;
use App\Traits\HasTable;
use App\Traits\HasCheckbox;
use App\Models\offersType;
use App\Models\Product;
use App\Traits\HasMultiSelect;
use Livewire\Attributes\Computed;
use App\services\productOffersService;

class Offers extends Component
{


    use HasTable;
    use HasMultiSelect;
    use HasCheckbox;
    
        public $statusFilter= null ;
        public $name;
        public $start_date;
        public $end_date;
        public $type_id;
        public $requirments;
        public $remarks;
        public $status =1 ;
        public $offer_id;
        public $edit_id;
        public $discount;
        public $offers;
        public $quantity;
        public $discount_precent;
        protected $offerService;
        protected $write_permission="write offer";



    

public function __construct()
{
    $this->offerService = app(productOffersService::class);
}

    public function mount(){
        if(!authedCan($this->write_permission)){
            $this->statusFilter = 2;
           }
        $this->offers = offersType::all() ; 
      $this->check_permission('view offers');
          
    }
    
    protected function rules()
       {
            return [ 
            'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-%]+$/u',
            'start_date' => 'required|date',
            'end_date'=>'required|date',
            'status'=>'numeric',
            'type_id'=>'numeric',
            'requirments'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'remarks'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                        ];
    }
    
    


    
    
     public function store(){
          try{
            $this->check_permission($this->write_permission);
            $validatedData = $this->validate();
            $this->offerService->store($validatedData);
             $this->success();
         }catch (\Exception $e) {
                errorMessage($e);
     }
    }
    

     public function edit(int $id){
     $edit= offer::findOrFail($id);
     if($edit){
      $this->edit_id = $id;
      $this->name =$edit->name;
      $this->start_date =$edit->start_date;
      $this->end_date =$edit->end_date;
      $this->type_id =$edit->type_id;
      $this->requirments =$edit->requirments;
      $this->status =$edit->status;
      $this->remarks =$edit->remarks;
     }else{
      return redirect()->back();
     }
    
    
     }
    
     public function update(){
        try{
            $this->check_permission($this->write_permission);
            $validatedData = $this->validate();
            $this->offerService->update($this->edit_id,$validatedData);
            $this->success();
         }catch (\Exception $e) {
    
            errorMessage($e);
           };   
    
     }
    
     
    
    
    public function AssignProducts(){
        try{
            $this->check_permission($this->write_permission);
            $validatedData = $this->validate(
                [
                    'checked_ids' =>'required',
                ]);
       $this->offerService->AssignProducts($this->offer_id,$validatedData['checked_ids']);
       successMessage();
        }catch(\Exception $e){
            errorMessage($e);
    }
    }
    

    
    
    public function Launch(){
        try{
            $this->check_permission($this->write_permission);
       $this->offerService->Launch($this->offer_id);
        }catch(\Exception $e){
            errorMessage($e);
    }
    }
    
    
    
    public function suspend(){
        try{
        $this->check_permission($this->write_permission);
        $this->offerService->suspend($this->offer_id);
        successMessage();
        }catch(\Exception $e){
            errorMessage($e);
    }
    }
    
    
    
     public function gettingId(int $offer_id){
        $this->offer_id= $offer_id;
    
        }
    
    
    
     public function delete(){
       try {
        $this->check_permission($this->write_permission);
         $this->offerService->delete($this->offer_id);
        }catch (\Exception $e){
            errorMessage($e);
        }
    }
    
    

    public function runDiscount(){
        try{
            $this->check_permission('run discount');
            $validatedData = $this->validate(
                [
                    'discount_precent'=>'numeric|required|between:0,0.85',
                ]
            );
            $this->offerService->runDiscount($this->offer_id,$validatedData);
         $this->success();
         }catch (\Exception $e) {   
        errorMessage($e);
           };   

    }
    
     
    
    public function closeModal()
    {
       $this->reset([ 'checked_ids', 'discount_precent','name','start_date','end_date','type_id','requirments','remarks']);
    }
    
    #[Computed]
    public function data(){
        return 
        $this->offerService->index($this->statusFilter,$this->search,$this->sortfilter,$this->perpage);
    }
    
    public function render()
    {
        $discountable_products = Product::with('items','type')->where('status',2)
        ->where('name', 'like', '%'.$this->check_search.'%')
        ->get();
        return view('livewire.admin.products.offers',compact('discountable_products'));
    }
}
