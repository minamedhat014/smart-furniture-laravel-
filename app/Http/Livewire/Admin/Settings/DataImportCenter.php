<?php


namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Traits\HasFileUpload;
use App\Imports\customerImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class DataImportCenter extends Component
{
    use HasFileUpload;


  public function updateCustomers(){
    try{
        $validatedData = $this->validate([
            'file' => 'required|mimes:xls,xlsx|max:2048', // Validating Excel files
        ]);
        
        Excel::import(new customerImport, $validatedData['file']);
        successMessage();
       $this->closeModal();
    }catch(\Exception $e){
        DB::rollBack();
        session()->flash('error', $e->getMessage());
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
