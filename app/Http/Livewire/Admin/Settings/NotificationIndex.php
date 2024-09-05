<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Traits\HasTable;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationIndex extends Component
{

 use HasTable;
       
    public function readAll(){
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
    }
        

    public function render()
    {

        $user = Auth::user();
        $unReadnotifications = $user->unreadNotifications()
        ->orderBy('created_at', 'desc')
        ->get();

        $readnotifications = $user->readNotifications()
            ->where('data', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.admin.settings.notification-index',compact('readnotifications','unReadnotifications'));
    }
}
