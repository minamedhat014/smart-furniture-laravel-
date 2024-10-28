<?php


namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Traits\HasFileUpload;
use App\Imports\customerImport;
use App\Traits\HasTable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class DataImportCenter extends Component
{
    use HasFileUpload;
    use HasTable;

    protected  $write_permission = 'upload data';



    public function mount(){
        $this->check_permission($this->write_permission); 
    }

  public function updateCustomers(){
    try{
        $this->check_permission($this->write_permission); 
        $validatedData = $this->validate([
            'file' => 'required|mimes:xls,xlsx|max:2048', // Validating Excel files
        ]);
        Excel::import(new customerImport, $validatedData['file']);
       
    }catch(\Exception $e){
        DB::rollBack();
       errorMessage($e);
    }  
    }     

     
    
    public function closeModal()
    {
       $this->reset([ 'file']);
    }

    public function render()
    {
        return view('livewire.admin.settings.data-import-center');
    }
}
