<div>

  @if($order_id)
    <x-app-table name="Details related to  order no. {{$order_id}} ">
        <x-slot name="header">
       @if($status == 'open') 
        <x-table-button icon="fa-solid fa-circle-plus" target="addDetails" />
       @endif 

        </x-slot> 
        <x-slot name="head">  
          <th class="col-1"> Serial </th>
          <th class="col-2"> Item Code </th>
          @if($order_type == "living non-standard" || $order_type == "kitchen non-standard")
          <th class="col-2"> Specifications</th>
          @endif
          <th class="col-2"> Item description </th>
          <th class="col-1"> quantity </th>
          <th class="col-1"> Warhouse </th>
          <th class="col-1"> Unit price </th>
          <th class="col-1"> Extra discount </th>
          <th class="col-2"> Unit price after extra discount </th>
          <th class="col-1"> total item price </th>
          <th class="col-1"> Remarks</th>
          <th class="col-1"> Actions </th>
    
        </x-slot>
       
        <x-slot name="body" wire:poll.750ms >

        @php
          $i=0;
        @endphp
         @foreach($this->data as $key => $row)
        <tr>
         @php
         $i++;
         @endphp  

         <td> {{$i}}</td>
         <td> {{$row->productDetails?->item_code}}</td>
         @if($order_type == "living non-standard" || $order_type == "kitchen non-standard")
         <td> {{$row->specifications}}</td>
         @endif
         <td> {{$row->productDetails?->descripation}}</td>
         <td> {{$row->quantity}}</td>
         <td> {{$row->wharehouse}}</td>
         <td> {{$row->unit_price}}</td>
     
         <td> <span class="badge bg-success">{{$row-> branch_extra_discount }} % </span> </td>
         <td> {{$row-> unit_price_after_discount }}</td>
         <td> {{$row-> final_price }}</td>
         <td> {{$row->remarks}}</td> 
       
         <td>
          @if($this->data->first()->order?->status?->name == 'open')
            <div>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
             Actions
              </button>
              <div class="dropdown-menu">
            
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editorderDetailsModal" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#DeleteOrderDetailsModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>     
              </div>
              @endif
          </td> 
       
          </tr>
         @endforeach

         <tfoot class="custom-table-footer"> 
  {{-- row   --}}
          <tr> 
        <th scope="row" colspan="8" > total price </th>
         <td colspan="3" style="text-align: center">
       
          {{$this->data->sum('final_price')}}
         </td>
         </tr>
   {{-- row   --}}
 
        </x-slot>
        <x-slot name="footer">  
          {{$this->data->links()}}  
        </x-slot>
        </x-app-table>   

     @endif
        @include('livewire.admin.orders.orderDetailsModal')
</div>