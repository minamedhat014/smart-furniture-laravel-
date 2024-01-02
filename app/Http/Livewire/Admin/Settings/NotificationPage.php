<?php

namespace App\http\Livewire\Admin\Settings;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class NotificationPage extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


public $search;
public $user;
public $perpage =5;
public $sortfilter ='desc';



    public function updatingSearch()
        {
            $this->resetPage();
        }
        
    public function render()
    {
   
        $user = Auth::user();

        $data = $user->readNotifications()
      ->where('data', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.settings.notification-page',compact('data'));
    }
}
