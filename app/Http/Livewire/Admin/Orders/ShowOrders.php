<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\customerOrder;
use App\Models\orderStatus;
use Illuminate\Support\Facades\Auth;

class ShowOrders extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
 
     public $search;
     public $perpage =5;
     public $sortfilter ='desc';
     public $user;
     public $company_id;
     public $orderStatus;
     public $statuses;



     public function mount(){
        $this->user=Auth::user()->name;  
        $this->company_id=Auth::user()->company_id;
        $this->statuses= orderStatus::all('id','name');
            }
   
     
    public function render()
    {
        if(userFactory()){
            $data = customerOrder::with('customer', 'orderDetails', 'store', 'address')
            ->when($this->orderStatus,function($query){
           $query->where('status_id',$this->orderStatus);
            })
            ->when($this->search,function($query){
                $query->whereRelation('customer','name', 'like', '%' . $this->search . '%')
                ->orwhereRelation('customer','national_id', 'like', '%' . $this->search . '%')
                ->orwhereRelation('store','name', 'like', '%' . $this->search . '%');
            })
                    ->orderBy('id', $this->sortfilter) ->paginate($this->perpage);
        } else{  
            $data = customerOrder::with('customer', 'orderDetails', 'store', 'address')
            ->whereRelation('store', 'company_id', $this->company_id)
            ->when($this->orderStatus,function($query){
                $query->where('status_id',$this->orderStatus);
                 })
            ->when($this->search ,function ($query){
           $query->whereRelation('customer','name', 'like', '%' . $this->search . '%')
           ->orwhereRelation('customer','national_id', 'like', '%' . $this->search . '%')
           ->orwhereRelation('store','name', 'like', '%' . $this->search . '%');
            })
            
         ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        }
        return view('livewire.admin.orders.show-orders',compact('data'));
    }
}
