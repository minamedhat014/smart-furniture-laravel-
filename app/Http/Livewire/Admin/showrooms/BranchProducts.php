<?php

namespace App\Http\Livewire\Admin\Showrooms;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\showroomProduct;

class BranchProducts extends Component
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
        $data=showroomProduct::with('showroom','product')
        ->WhereHas('product', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.showrooms.branch-products',compact('data'));
    }
}
