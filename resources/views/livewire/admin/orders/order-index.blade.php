<div>  
  @if($customer)

<x-app-table name=" List of orders related to  {{$customer->name ?? ''}} ">
    <x-slot name="header">
    <x-table-button icon="fa-solid fa-circle-plus" target="addorderModal" />
    </x-slot> 
    <x-slot name="head">  
     <th class="col-1"> order number </th>
      <th class="col-2"> Created at</th>
      <th class="col-1"> Name </th>
      <th class="col-1"> Branch </th>
      <th class="col-1"> Sales name </th>
      <th class="col-1"> Delivery address </th>
      <th class="col-1"> Remarks</th>
      <th class="col-1"> Status </th> 
      <th class="col-1"> Actions </th>

    </x-slot>
    
    <x-slot name="body" wire:poll.750ms>

     @foreach($this->orders as $key => $row)
      <tr>
        <td> {{$row->id}}</td>
        <td> {{$row->created_at}}</td>
        <td> {{$row->customer?->name}}</td>
        <td>
          <span class="badge bg-warning"> 
          {{$row->store?->name}}
        </span>
        </td>
        <td> {{$row->sales_name}}</td>
        <td>
          <span class="badge bg-primary"> 
           {{$row->address?->city}} - {{$row->address->address}}
          </span>
          </td>
        <td> {{$row->remarks}}</td>
        <td>
          @if($row->status_id === 1)
          <span class="badge bg-success"> 
            open 
        </span>
          @elseif($row->status_id===2)
          <span class="badge bg-secondary"> 
           Delivered
        </span>
        @elseif($row->status_id===3)
          <span class="badge bg-danger"> 
           Delivered with Complaint
        </span>
        @elseif($row->status_id===4)
        <span class="badge bg-waring"> 
         Delivered without installation
      </span>
      @elseif($row->status_id===5)
      <span class="badge bg-info"> 
      sent to the factory 
    </span>
    
   
     @endif

     <td>
          <div>
            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
           Actions
            </button>
            <div class="dropdown-menu">
              <li><a href="{{route('orderDetails.index',$row->id)}}" class="dropdown-item"  type="button"  ><i class="fa-solid fa-circle-info"></i> order details </a> </li>
              <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#orderDocumentDisplay" wire:click='orderDocument({{$row->id}})' type="button"> <i class="fa-solid fa-image"></i> View order documents </a></li>
              @if($row->status_id ===1)
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editorderModal" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteOrderModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#sendOrderModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-share-from-square"></i> Send to factory </a> </li>
              @endif
             
            </div>
        </td> 

      </tr>
     @endforeach  
    </x-slot>
    
    <x-slot name="footer">
      @include('livewire.admin.orders.orderModal')

    </x-slot>
    </x-app-table>
    @endif
    
    </div>
    
  
    
  
  
  
  
  