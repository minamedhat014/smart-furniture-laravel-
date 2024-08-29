<?php

namespace App\http\Livewire\Admin\Showrooms;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\showroomProduct;
use App\Traits\HasTable;
use Illuminate\Support\Facades\Auth;

class ShowroomProducts extends Component
{
 
    use HasTable;
    public $showRoom_id;
    public $product_id;
    public $quantity ;
    public $special_offer;
    public $remarks;
    public $created_by;
    public $updated_by;
    public $edit_id;
    public $delete_id;
    public $products;
    protected $write_permission="showroom products";


   



    public function mount()
    {
        $this->products=Product::all('id','name');
    }
     

protected function rules()
  {
       return [ 
      'showRoom_id'=>'required|numeric',
        'product_id' => 'required|integer',
       'quantity' => 'required|integer|max:50',
       'special_offer'=>'nullable|numeric',
       'remarks'=>'',

                   ];
}



public function closeModal()
    {
        $this->reset(['product_id','quantity','special_offer','remarks']);
    }


public function store(){
     try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
       showroomProduct::create([
'showRoom_id' => $validatedData['showRoom_id'],
 'product_id'=>$validatedData['product_id'],
 'quantity'=>$validatedData['quantity'],
 'special_offer'=>$validatedData['special_offer'],
 'remarks'=>$validatedData['remarks'],
 'created_by'=> authName(),
        ]);

      $this->success();
       }catch (\Exception $e) {

      errorMessage($e);
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
    $this->check_permission($this->write_permission);
    $validatedData = $this->validate();
    $showrooms=showroomProduct::FindOrFail($this->edit_id);
    $showrooms->update([
    'product_id'=>$validatedData['product_id'],
    'quantity'=>$validatedData['quantity'],
    'special_offer'=>$validatedData['special_offer'],
    'remarks'=>$validatedData['remarks'],
    'updated_by'=>authName(),
    ]);
    $this->success();  
   }catch(\Exception $e){
    session()->flash('error', $e); 
   }

}



public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



  public function delete(){
    try {
     $this->check_permission($this->write_permission);
    showroomProduct::FindOrFail($this->delete_id)->delete();
   successMessage();
    }catch (\Exception $e){
        errorMessage($e);
   }
}

    public function render()
    {
  
        $data=showroomProduct::with('showroom','product')->where('showRoom_id',$this->showRoom_id)
        ->WhereHas('product', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', $this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.showrooms.showroom-products',compact('data'));
    }
}
