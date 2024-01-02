<?php

namespace App\Http\Livewire\Admin\Showrooms;

use Livewire\Component;
use App\Models\showRoomTeam;
use Livewire\WithPagination;

class BranchStaff extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $perpage =5;
    public $sortfilter ='desc';




public function updatingSearch()
    {
        $this->resetPage();
    }

protected $queryString = ['search'];

    public function render()
    {
        $data= showRoomTeam::with('branch')
        ->WhereHas('branch', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.showrooms.branch-staff',compact('data'));
    }
}
