


<div>
<x-app-table name="List of customers">
  <x-slot name="header">
    @can('write customer')
<x-table-button icon="fa-solid fa-circle-plus" target="addModal" />
   @endcan
  </x-slot>
  
  <x-slot name="head">
    <th>Id</th>
    <th> Title </th>
    <th>Name </th>
    <th> Date of birth </th>
    <th> Date of marriage </th>
    <th> Branches </th>
    <th> Phones </th>
    <th> Type </th>
    <th> Address </th>
    <th> Created By </th>
    @can('write customer')
    <th> Actions </th>
    @endcan
  </x-slot>
  
  <x-slot name="body">
   
                           
    @foreach($this->customers as $key => $row)
    <tr >
      <td> {{$row->id}}</td>
      <td> <span class="badge bg-info"> {{$row->title}} </span> </td>
      <td> {{$row->name}}</td>
      <td> {{$row->date_of_birth}}</td>
      <td> {{$row->date_of_marriage}}</td>
      <td>
        @foreach($row->stores()->get() as $key => $ro)
        <span class="badge bg-warning"> 
         {{$ro->name}}
        </span>
        @endforeach
      </td>
        <td> 
       @foreach($row->phone as $key => $pho)
       <span class="badge bg-success"> 
       {{$pho->number}}
      </span>
       @endforeach
        </td>

      <td> {{$row->type}}</td>
      <td>
@foreach($row->address as $key => $add)

@can('write customer')
<div>
  <button type="button" class="badge bg-primary dropdown-toggle col-10" data-toggle="dropdown" style="border: none;  outline:none">
 {{$add->city}} - {{$add->address}}
  </button>
  <div class="dropdown-menu">

    <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#editAddress" wire:click="editAddresses({{$add->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
    <li><a data-bs-toggle="modal" class="dropdown-item"  wire:click="deleteAddress({{$add->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>

  </div>
  @endcan

@endforeach
      </td>
 
      <td>
        {{displayCreatedBy($row ->created_by)}}
      </td>
            <td>
              <div>
                <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
               Actions
                </button>
                <div class="dropdown-menu">
                  @can('write customer')
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editCustomerModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addAddress" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-location-dot"></i> Add another address </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteCustomerModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                  <li><a class="dropdown-item"  href="{{route('customerOrder.index',['id'=>$row->id])}}" target="_blank" type="button"  ><i class="fa-solid fa-cart-shopping"></i> Orders </a> </li>

                  @endcan
                  
                  @if($showList == false)
                  <li><a data-bs-toggle="modal" class="dropdown-item"  wire:click="select({{$row->id}})" type="button"  ><i class="fa-solid fa-circle-check"></i> Select </a> </li>
                  @endif
                </div>
            </td> 
    </tr>
    @endforeach

  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.customers.customerModal')
    @if($showList == true)
    {{ $this->customers->links() }} 
    @endif
  </x-slot>
  </x-app-table>
  
  </div>
  

  




