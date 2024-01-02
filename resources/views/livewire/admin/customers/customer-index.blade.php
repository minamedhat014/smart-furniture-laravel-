<x-app-table name=" List of customers ">
  <x-slot name="header">
<x-table-button icon="fa-solid fa-circle-plus" target="addModal" />
  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-1">ID</th>
    <th class="col-1"> Created at</th>
    <th class="col-1"> Customer Name </th>
    <th class="col-1"> Branches </th>
    <th class="col-1"> National id </th>
    <th class="col-1"> Phones </th>
    <th class="col-1"> Type </th>
    <th class="col-2"> Address </th>
    <th class="col-1"> Actions </th>

  </x-slot>
  
  <x-slot name="body">
   
                           
    @foreach($data as $key => $row)
    <tr>
      <td> {{$row->id}}</td>
      <td> {{$row->created_at}}</td>
      <td> {{$row->name}}</td>
      <td>
        @foreach($row->stores()->get() as $key => $ro)
        <span class="badge bg-warning"> 
         {{$ro->name}}
        </span>
        @endforeach
      </td>
      <td> {{$row->national_id}}</td>
       
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
<div>
  <button type="button" class="badge bg-primary dropdown-toggle col-10" data-toggle="dropdown" style="border: none;  outline:none">
 {{$add->city}} - {{$add->address}}
  </button>
  <div class="dropdown-menu">

    <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#editAddress" wire:click="editAddresses({{$add->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
    <li><a data-bs-toggle="modal" class="dropdown-item"  wire:click="deleteAddress({{$add->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>

  </div>
@endforeach
      </td>

            <td>
              <div>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               Actions
                </button>
                <div class="dropdown-menu">
              
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editCustomerModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addAddress" wire:click="getId({{$row->id}})" type="button"  ><i class="fa-solid fa-location-dot"></i> Add another address </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteCustomerModel" wire:click="getId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
              
                </div>
            </td> 
    </tr>
    @endforeach

  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.customers.customerModal')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  

  




