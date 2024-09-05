<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Traits\HasTable;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class NotificationPage extends Component
{

use HasTable;
        
    public function render()
    {
   
        $user = Auth::user();
        $data = $user->readNotifications()
      ->where('data', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.settings.notification-page',compact('data'));
    }
}
