<?php

namespace App\Http\Livewire\Admin\Customers;

use App\http\Livewire\Admin\Customers\CustomerIndex;
use App\Models\Customer;
use App\Models\CustomerType;


class MyCustomers extends CustomerIndex
{
 
    public function render()
    {
        $data= Customer::with('stores','phone','address')
        ->where('created_by', authName())
        ->when($this->search,function($query){
          $query->where('name', 'like', '%'.$this->search.'%')
        ->orwhereRelation('phone','number','like','%'. $this->search . '%');
        }) 
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        $types=CustomerType::all('name');
        return view('livewire.admin.customers.my-customers',compact('data','types'));
    }
}
