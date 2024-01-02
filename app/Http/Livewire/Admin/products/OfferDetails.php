<?php

namespace App\http\Livewire\Admin\Products;


use App\Models\Price;
use Livewire\Component;
use App\Models\OfferDetail;
use Livewire\WithPagination;
use App\Models\productDetail;
use Illuminate\Support\Facades\Auth;

class OfferDetails extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $item_id;
    public $quantity = 1;
    public $details;
    public $discount;
    public $discount_entered;
    public $end_user_price;
    public $offer_id;
    public $user;
    public $price;
    public $items;
    public $edit_id;
    public $delete_id;

    

    public function updated($feilds)
    {
        $this->validateOnly($feilds);
    }
    
    protected $queryString = ['search'];
        
    
        
    
        public function hydrate(){
          $this->dispatchBrowserEvent('pharaonic.select2.init');
          $this->dispatchBrowserEvent('pharaonic.select2.load', [
              'component' => $this->id,
              'target'    => '#multiSelect'
          ]);
       }
      
    

   
    public function mount()
    {
        $this->items = productDetail::all('id','item_code') ;
     $this->user= Auth::user()->name;   
    }

    

protected function rules()
{

     return [  
     'item_id' => 'required|numeric',
     'quantity' => 'required|numeric',
     'details'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|max:500',
     'discount'=>'required|numeric|between:0,99.99',
     'end_user_price'=>'required',
                 ];
}




public function store(){ 
 $validatedData = $this->validate();
    try{
    
OfferDetail::create([
    'offer_id'=> $this->offer_id,
'item_id'=>$validatedData['item_id'],
'quantity'=>$validatedData['quantity'],
'details'=>$validatedData['details'],
'discount'=>$validatedData['discount'],
'price' =>$this->price,
'end_user_price'=>$validatedData['end_user_price'],
'created_by'=> $this->user,
       ]);
       $this->reset(['quantity','item_id','details','discount','end_user_price']);
       $this->emit('closeModal');
       session()->flash('success','done successfully');
   }catch (\Exception $e) {

          session()->flash('error',$e);
     };   
}

public function edit(int $id){
$edit= OfferDetail::findOrFail($id);
if($edit){
$this->edit_id = $id;
$this->offer_id =$edit->offer_id;
$this->item_id =$edit->item_id;
$this->quantity =$edit->quantity;
$this->details =$edit->details;
$this->discount =$edit->discount;

}else{
return redirect()->back();
}


}

public function update(){
    $validatedData = $this->validate();
  try{
   $offers= OfferDetail::FindOrFail($this->edit_id);
   $offers->update([
    'offer_id'=> $this->offer_id,
    'item_id'=>$validatedData['item_id'],
    'quantity'=>$validatedData['quantity'],
    'details'=>$validatedData['details'],
    'discount'=>$validatedData['discount'],
    'end_user_price'=>$validatedData['end_user_price'],
    'remarks'=>$validatedData['remarks'],
    'updated_by'=> $this->user,
       ]);
       $this->reset(['quantity','item_id','details','discount','end_user_price']);
       $this->emit('closeModal');
       session()->flash('success','done successfully');
  }catch(\Exception $e){
      session()->flash('error',$e);
  }

}

public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }


 public function delete(){
    try {
      OfferDetail::FindOrFail($this->delete_id)->delete();
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
 } 


 public function closeModal()
 {
    $this->reset(['quantity','item_id','details','discount','end_user_price']);
 }
    
    public function render()
    {
        $this->discount = $this->discount_entered/100;
        $data=OfferDetail::with('productItem')->where('offer_id',$this->offer_id)->paginate();
        $this->price = Price::where('product_detail_id',$this->item_id)->sum('end_after_discount') * $this->quantity;
        $discount_amount = $this->price * $this->discount ;
        $this ->end_user_price = $this->price - $discount_amount;
        return view('livewire.admin.products.offer-details' ,compact('data'));
    }

}
