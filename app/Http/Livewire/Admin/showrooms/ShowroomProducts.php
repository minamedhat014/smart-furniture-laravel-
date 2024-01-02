<?php

namespace App\http\Livewire\Admin\Showrooms;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\showroomProduct;
use Illuminate\Support\Facades\Auth;

class ShowroomProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $showRoom_id;
    public $product_id;
    public $quantity ;
    public $special_offer;
    public $remarks;
    public $created_by;
    public $updated_by;
    public $user;
    public $edit_id;
    public $delete_id;


   


    public function updated($feilds)
    {
        $this->validateOnly($feilds);
    }
    
    
    
    public function updatingSearch()
        {
            $this->reset();
        }
    

    public function mount()
    {
        $this->user= Auth::user()->name;         
    }
     

protected function rules()
  {
       return [ 
      'showRoom_id'=>'required|numeric',
        'product_id' => 'required|integer',
       'quantity' => 'required|integer|max:50',
       'special_offer'=>'',
       'remarks'=>'',

                   ];
}



public function closeModal()
    {
        $this->reset(['product_id','quantity','special_offer','remarks']);
    }

public function store(){
 
 $validatedData = $this->validate();
     try{
       showroomProduct::create([
'showRoom_id' => $validatedData['showRoom_id'],
 'product_id'=>$validatedData['product_id'],
 'quantity'=>$validatedData['quantity'],
 'special_offer'=>$validatedData['special_offer'],
 'remarks'=>$validatedData['remarks'],
 'created_by'=> $this->user,
        ]);

        $this->reset(['product_id','quantity','special_offer','remarks']);
      session()->flash('success', 'Done sucessfully'); 
      $this->emit('closeModal');
       }catch (\Exception $e) {

        session()->flash('error',$e); 
      };   
}

public function edit(int $id){
$edit= showroomProduct::findOrFail($id);
if($edit){
 $this->edit_id = $id;
 $this->product_id =$edit->product_id;
 $this->quantity =$edit->quantity;
 $this->special_offer =$edit->special_offer;
 $this->remarks =$edit->remarks ;
}else{
 return redirect()->back();
}


}

public function update(){

   try{
    $validatedData = $this->validate();
    $showrooms=showroomProduct::FindOrFail($this->edit_id);
    $showrooms->update([
    'product_id'=>$validatedData['product_id'],
    'quantity'=>$validatedData['quantity'],
    'special_offer'=>$validatedData['special_offer'],
    'remarks'=>$validatedData['remarks'],
    'updated_by'=>$this->user,
    ]);
    $this->reset(['product_id','quantity','special_offer','remarks']);
    $this->emit('closeModal');
    session()->flash('success', 'Done sucessfully');    
   }catch(\Exception $e){
    session()->flash('error', $e); 
   }

}



public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



  public function delete(){
    try {
    showroomProduct::FindOrFail($this->delete_id)->delete();
    session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        session()->flash('error', $e); 
   }
}

    public function render()
    {
        $products=Product::all();
        $data=showroomProduct::with('showroom','product')->where('showRoom_id',$this->showRoom_id)
        ->WhereHas('product', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.showrooms.showroom-products',compact('data','products'));
    }
}
