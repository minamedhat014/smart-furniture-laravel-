
<div>
 
<x-app-table name=" Search or Add customer firstly ">
  <x-slot name="header">
<x-table-button icon="fa-solid fa-circle-plus" target="addModal" />

<span class=" table-tag"> 
  you can search by Name , National id , Phones
</span>
  </x-slot>
  <x-slot name="head">
    
    <th class="col-1"> customer Code </th>
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
    <tr>
      <td> {{$customer->id }} </td>
      <td> {{$customer->created_at }}</td>
      <td> {{$customer->name }}</td>
      <td>
        @foreach($customer->stores  as $key => $ro)
        <span class="badge bg-warning"> 
         {{$ro->name}}
        </span>
        @endforeach
      </td>
      <td> {{$customer->national_id }}</td>
       
        <td> 
       @foreach($customer->phone  as $key => $pho)
       <span class="badge bg-success"> 
       {{$pho->number}}
      </span>
       @endforeach
        </td>

      <td> {{$customer->type  }}</td>
      <td>
@foreach($customer->address  as $key => $add)
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
              
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editCustomerModel" wire:click="edit({{$customer->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addAddress" wire:click="getId({{$customer->id}})" type="button"  ><i class="fa-solid fa-location-dot"></i> Add another address </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteCustomerModel" wire:click="getId({{$customer->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
              
                </div>
            </td> 
    </tr>
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.customers.customerModal')

  </x-slot>
  </x-app-table>

  </div>
  
  

  




