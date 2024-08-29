<?php

namespace App\Http\Livewire\Admin\Showrooms;

use Livewire\Component;
use App\Models\showroomProduct;
use App\Traits\HasTable;

class BranchProducts extends Component
{

 use HasTable;




    public function render()
    {
        $data=showroomProduct::with('showroom','product')
        ->WhereHas('product', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');})
        ->orderBy('id', 'desc')->paginate(5);
        return view('livewire.admin.showrooms.branch-products',compact('data'));
    }
}
