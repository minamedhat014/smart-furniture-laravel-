<?php

namespace App\Http\Livewire\Admin\Showrooms;

use Livewire\Component;
use App\Models\showRoomTeam;
use App\Traits\HasTable;
use Livewire\WithPagination;

class BranchStaff extends Component
{
 use HasTable;




    public function render()
    {
        $data= showRoomTeam::with('branch')
        ->WhereHas('branch', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', $this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.showrooms.branch-staff',compact('data'));
    }
}
