<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Availableitem;
use App\Models\productDetail;
use App\Traits\HasfileUpload;
use Livewire\Attributes\Computed;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\availableItemsExport;
use App\services\AvailableItemService;

class AvailableItems extends Component
{

    use HasTable;
    use HasFileUpload;
    public $balance;
    public $item_id;
    public $consumption_rate_per_week;
    public $available_date;
  

 
   protected $AvaialableItemService;




    public function __construct()
    {
        $this->AvaialableItemService = app(AvailableItemService::class);
    }


public function mount(){
    $this->check_permission('view available items');
}
    protected function rules()
    {
            return [ 
                'balance' =>'required|min:3|numeric',
                'consumption_rate_per_week' => 'required|min:3|numeric',
                'available_date'=>'nullable|date',
                        ];
    }
    
    
    public function gettingItemId($id)
        {
            $this->item_id = $id;
        }
    
     
    public function updateList(){
        try{
            $this->check_permission('upload available');
            $validatedData = $this->validate([
                'file' => 'required|mimes:xls,xlsx|max:2048', // Validating Excel files
            ]);
            $this->AvaialableItemService->updateList($validatedData['file']);
           $this->success();
        }catch(\Exception $e){
         
            errorMessage($e);
        }
    
     }



     public function closeModal(){
     $this->reset([
      'file','balance','consumption_rate_per_week','available_date'
     ]);
     }
    
     public function edit($id){
        $this->item_id = $id;
        $item= productDetail::findOrFail($id);
        $item_code = $item->item_code; 
        $edit= Availableitem::where('item_code',$item_code)->first();
        if($edit){
        $this->balance = $edit->balance;
        $this->consumption_rate_per_week = $edit->consumption_rate_per_week;
        $this->available_date = $edit->available_date;
        }else{
         return redirect()->back();
     }
    }
    
    
    public function update(){
       try{
        $this->check_permission('edit or delete available');
        $validatedData = $this->validate();
        $this->AvaialableItemService->update($validatedData,$this->item_id);
        $this->closeModal();
        $this->dispatch('closeModal');
         }catch(\Exception $e){
             errorMessage($e);
         }  
         }
    



    public function delete(){
        $this->check_permission('edit or delete available');
        $this->AvaialableItemService->delete($this->item_id);

    }
    

    
public function export() 
{
    try{   
        $this->check_permission('download available');  
        return Excel::download(new availableItemsExport(), 'avilable items.xlsx');
    successMessage();
    }catch (\Exception $e){
        errorMessage($e);
    }
}


#[Computed]
public function data(){

    return $this->AvaialableItemService->index($this->search,$this->sortfilter,$this->perpage);
}
 
    public function render()
    {
        return view('livewire.admin.products.available-items');
    }
}
