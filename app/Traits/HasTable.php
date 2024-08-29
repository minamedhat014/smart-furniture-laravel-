<?php

namespace App\Traits;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

trait HasTable {

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =20;
    public $sortfilter ='desc';
  
  

    protected function rules()
    {
         return [ 
       'search'=> 'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u'
       
         ];               
    }
    
    public function updated($feilds)
    {
        $this->validateOnly($feilds);
    }
    
    protected function check_permission($permission){

        if (!authedCan($permission)){
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            // Abort with a 403 Forbidden response and a message
            abort(403, 'Unauthorized action.');
        }
            
        }
     
    protected function success($message ='done successfully'){
        $this->closeModal();
        $this->dispatch('closeModal');
        successMessage($message);
    }

protected $queryString = ['search'];
    
 
    public function updatingSearch()
        {
            $this->resetPage();
        }


       


}