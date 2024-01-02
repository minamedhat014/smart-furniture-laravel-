<div>
<x-app-table name=" List of all orders ">
    <x-slot name="header">
      <x-table-select fname="select status" bname="orderStatus" :options="$statuses" value='id'/>
      <span class=" table-tag"> 
      you can search by customer name or national id or branch 
    </span>
   
    </x-slot> 
    <x-slot name="head">  
     <th class="col-1"> order number </th>
      <th class="col-2"> Created at</th>
      <th class="col-1"> Name </th>
      <th class="col-1"> Branch </th>
      <th class="col-1"> Sales name </th>
      <th class="col-1"> Delivery address </th>
      <th class="col-1"> Delivery Date </th>
      <th class="col-1"> Status </th> 
      <th class="col-1"> Actions </th>

    </x-slot>
    
    <x-slot name="body" wire:poll.750ms >

     @foreach($data as $key => $row)
      <tr>
        <td> {{$row->id}}</td>
        <td> {{$row->created_at}}</td>
        <td> {{$row->customer->name}}</td>
        <td>
          <span class="badge bg-warning"> 
          {{$row->store->name}}
        </span>
        </td>
        <td> {{$row->sales_name}}</td>
        <td>
          <span class="badge bg-primary"> 
           {{$row->address->city}} - {{$row->address->address}}
          </span>
          </td>
        <td> {{$row->delivery_date}}</td>
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
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
           Actions
            </button>
            <div class="dropdown-menu">
              <li><a href="{{route('orderDetails.index',$row->id)}}" class="dropdown-item"  type="button"  ><i class="fa-solid fa-circle-info"></i> order details </a> </li>
         
            </div>
        </td> 

      </tr>
     @endforeach  
    </x-slot>
    
    <x-slot name="footer">

    
    </x-slot>
    </x-app-table>
</div>