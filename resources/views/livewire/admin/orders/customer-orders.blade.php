<div>  
<x-app-table name=" List of orders related to  {{$customer->name ?? ''}} ">
    <x-slot name="header">

    <x-table-button icon="fa-solid fa-circle-plus" target="addOrderModal" />
    
    </x-slot> 
    <x-slot name="head">  
     <th class="col-1"> Order number </th>
      <th class="col-1"> Created at</th>
      <th class="col-1"> Order type</th>
      <th class="col-1"> Customer Name </th>
      <th class="col-1"> Branch </th>
      <th class="col-1"> Sales name </th>
      <th class="col-1"> Delivery address </th>
      <th class="col-1"> Remarks</th>
      <th class="col-1"> Status </th> 
      <th class="col-1"> Actions </th>

    </x-slot>
    
    <x-slot name="body">

     @foreach($this->orders as $key => $row)
      <tr>
        <td> {{$row->id}}</td>
        <td> {{onlyDate($row->created_at)}}</td>
        <td>  
          <span class="badge bg-dark"> 
          {{$row->order_type}}
        </span>
      </td>
        <td> {{$row->customer?->name}}</td>
        <td>
          <span class="badge bg-warning"> 
          {{$row->store?->name}}
        </span>
        </td>
        <td> {{$row->sales_name}}</td>
        <td>
          <span class="badge bg-primary"> 
           {{$row->address?->zone}} - {{$row->address->address}}
          </span>
          </td>
        <td> {{$row->remarks}}</td>
        <td>
        
          <span class="badge bg-info"> 
            {{$row->status?->name}}
        </span>
    
    
     <td>
          <div>
            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
           Actions
            </button>
            <div class="dropdown-menu">
              <li><a  class="dropdown-item"  href="{{route('orderDetails.index',$row->id)}}" type="button"  ><i class="fa-solid fa-eye"></i> View order lines </a> </li>
              @if($row->status?->name == 'open')
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#confirmOrderModal" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-clipboard-check"></i> Add Confirmation </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editorderModal" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteOrderModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
              @endif
              <li><a data-bs-toggle="modal" class="dropdown-item"  data-bs-target="#orderTrackingModal" wire:click="orderTrack({{$row->id}})" type="button"  ><i class="fa-brands fa-stack-exchange"></i> Track changes  </a> </li>
              <li> <a class="dropdown-item"  href="{{route('orderQoutation.print',$row->id)}}" type="button" target="blank"> <i class="fa-solid fa-print"></i> Print qoutation </a></li>
              <li> <a class="dropdown-item"  href="{{route('orderPDF.preview',$row->id)}}" type="button"  target="blank"> <i class="fa-solid fa-file-pdf"></i>View Confirmation documents </a></li>
              @if($row->status?->name == 'confirmed')
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#sendOrderModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-share-from-square"></i> Send to factory </a> </li>
              @endif

              @if($row->status?->name == 'sent to fcatory')
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#sendBackModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-share-from-square"></i> Send back to branch </a> </li>
              @endif

              @if($row->status?->name == "ready for dispatch" || $row->status?->name == "confirmed" ||$row->status?->name == "sent to fcatory"  )
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#setAppointmentModal" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-calendar"></i> set Delivery date</a> </li>
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
 
    </div>
    
  
    
  
  
  
  
  