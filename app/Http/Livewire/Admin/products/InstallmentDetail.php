<?php

namespace App\http\Livewire\Admin\Products;

use App\Models\banks;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\installmentDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\installmentDetails as ModelsInstallmentDetails;
use App\Traits\withTable;

class InstallmentDetail extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
  
       public $search;
       public $perpage =5;
       public $sortfilter ='desc';

    public $installment_id;
    public $user;
    public $delete_id;
    public $edit_id;
    public $banks;
    public $bank_name;
    public $max_months_installments =60;
    public $months_without_intrest =12 ;
    public $percentage_of_admin_fees;
    public $factory_intrest;
    public $branch_intrest;
    public $status=1;
    public $remarks;



    
public function updated($feilds)
{
    $this->validateOnly($feilds);
}

protected $queryString = ['search'];
    

    public function closeModal()
    {
       $this->reset();
    
    }

    public function hydrate(){
      $this->dispatchBrowserEvent('pharaonic.select2.init');
      $this->dispatchBrowserEvent('pharaonic.select2.load', [
          'component' => $this->id,
          'target'    => '#multiSelect'
      ]);
   }
  


    public function mount()
    {
    $this->user= Auth::user()->name;
     $this->banks= banks::all('id','name');
    }

    

protected function rules()
{

     return [ 
     'installment_id' =>'numeric',
     'bank_name' => 'required|required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|max:500',
     'max_months_installments' => 'required|numeric',
     'months_without_intrest' => 'required|numeric',
     'status' => 'numeric',
     'percentage_of_admin_fees'=>'required|numeric|between:0,30',
     'factory_intrest'=>'required|numeric|between:0,30',
     'branch_intrest'=>'required|numeric|between:0,30',
     'remarks'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|max:500',
                 ];
}


public function store (){ 
 $validatedData = $this->validate() ;
    try{   
installmentDetails::create([
    'installment_id'=> $this->installment_id,
    'bank_name'=>$validatedData['bank_name'],
    'max_months_installments'=>$validatedData['max_months_installments'],
    'months_without_intrest'=>$validatedData['months_without_intrest'],
    'status'=>$validatedData['status'],
    'percentage_of_admin_fees' =>$validatedData['percentage_of_admin_fees'],
    'factory_intrest'=>$validatedData['factory_intrest'],
    'branch_intrest'=>$validatedData['branch_intrest'],
    'remarks'=>$validatedData['remarks'],
    'created_by'=> $this->user,
           ]);
           $this->reset(['bank_name','max_months_installments','months_without_intrest','percentage_of_admin_fees','factory_intrest','branch_intrest','remarks']);
           session()->flash('success','done successfully');
           $this->emit('closeModal');
       }catch (\Exception $e) {
    
              session()->flash('error',$e);
       }
}

public function edit(int $id){
$edit= installmentDetails::findOrFail($id);
if($edit){
$this->edit_id = $id;
$this->installment_id =$edit->installment_id;
$this->bank_name =$edit->bank_name;
$this->max_months_installments =$edit->max_months_installments;
$this->months_without_intrest =$edit->months_without_intrest;
$this->status =$edit->status;
$this->percentage_of_admin_fees =$edit->percentage_of_admin_fees;
$this->factory_intrest =$edit->factory_intrest;
$this->branch_intrest =$edit->branch_intrest;
$this->remarks =$edit->remarks;


}else{
return redirect()->back();
}


}



public function update(){
    $validatedData = $this->validate();
  try{
   $update= installmentDetails::FindOrFail($this->edit_id);
   $update->update([
    'installment_id'=> $this->installment_id,
'bank_name'=>$validatedData['bank_name'],
'max_months_installments'=>$validatedData['max_months_installments'],
'months_without_intrest'=>$validatedData['months_without_intrest'],
'status'=>$validatedData['status'],
'percentage_of_admin_fees' =>$validatedData['percentage_of_admin_fees'],
'factory_intrest'=>$validatedData['factory_intrest'],
'branch_intrest'=>$validatedData['branch_intrest'],
'remarks'=>$validatedData['remarks'],
'created_by'=> $this->user,
       ]);
       $this->reset(['bank_name','max_months_installments','months_without_intrest','percentage_of_admin_fees','factory_intrest','branch_intrest','remarks']);
       $this->emit('closeModal');
           session()->flash('success','done successfully');
   }catch (\Exception $e) {

          session()->flash('error',$e);
   }

}

public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }


 public function delete(){
    try {
      installmentDetails::FindOrFail($this->delete_id)->delete();
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
 } 


 public function suspend(int $id){
    try{
        installmentDetails::where('id',$id)->update([
 'status'=>3,
 'updated_by'=>$this->user,
    ]); 
   session()->flash('success','done successfully');    

    }catch(\Exception $e){
    session()->flash('error',$e);
}
}
public function reactive(int $id){
    try{
        installmentDetails::where('id',$id)->update([
 'status'=>2,
 'updated_by'=>$this->user,
    ]); 
   session()->flash('success','done successfully');    

    }catch(\Exception $e){
    session()->flash('error',$e);
}
}

    public function render()
    {
        $data= installmentDetails:: with('installment')->paginate($this->perpage);
        return view('livewire.admin.products.installment-detail',compact('data'));
    }
}
