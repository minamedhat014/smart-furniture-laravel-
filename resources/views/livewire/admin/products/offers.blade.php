<div>

        <x-app-table name="List of offers">
          <x-slot name="header"> 
            <x-table-select fname="Status filter" bname="statusFilter" 
            :options="[['id' => 1, 'name' => 'Not launched'],['id' => 2, 'name' => 'Active'],['id' => 3, 'name' => 'cancelled']]" value="id"/> 
           
            @can('add offer')
        <x-table-button icon="fa-solid fa-circle-plus" target="addoffersModel" />
           @endcan
          </x-slot>
          
          <x-slot name="head">
            
            <th>ID</th>
            <th class="col-1"> Name</th>
            <th class="col-1"> Start date</th>
            <th class="col-1"> End date</th>
            <th class="col-2"> offer type </th>
            <th class="col-1"> Discount percentage </th>
            <th class="col-1"> status </th>
            <th class="col-2"> Requirments</th>
            <th class="col-2"> Remarks</th>
            <th class="col-1"> Actions </th>
        
          </x-slot>
          
          <x-slot name="body">
 
            @foreach($this->data as $row)
            <tr>
              <td> {{$row->id}}</td>
              <td> {{$row->name}}</td>
              <td> {{$row->start_date}}</td>
              <td> {{$row->end_date}} </td>
              <td> {{$row->typeOffer?->name}}</td>
      <td>
       
        {{$row->discount?->discount_percentage*100}} %
      
      </td>
            <td>
              @if($row->status == 1)
              <span class="badge bg-primary"> not Launched</span>
             @elseif($row->status== 2)
            <span class="badge bg-success"> active </span>
            @elseif($row->status== 3)
            <span class="badge bg-danger"> deactive </span>
                @endif
              </td>
              <td> {{$row->requirments}}</td>
              <td> {{$row->remarks}} </td>
             
                  <td>
                    <div>
                      <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                        Actions
                      </button>
                      <div class="dropdown-menu">
                        @can('write offer')
                        <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editoffersModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                        <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteoffersModel" wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                        
                        <li><a data-bs-toggle="modal" class="dropdown-item"  data-bs-target="#assignProducts"  wire:click="gettingId({{$row->id}})"  type="button"  > <i class="fa-solid fa-tag"></i> Assign to products </a> </li>
                       
                        <li><a data-bs-toggle="modal" class="dropdown-item"  data-bs-target="#launchOffer"  wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-play"></i> Launch offer</a> </li>
                        <li><a data-bs-toggle="modal" class="dropdown-item"  data-bs-target="#suspendOffer" wire:click="gettingId({{$row->id}})"type="button"  ><i class="fa-solid fa-ban"></i> Suspend offer</a> </li>
                        @endcan

                        @can('run discount')
                        <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#runDiscount" wire:click="gettingId({{$row->id}})" type="button"  > <i class="fa-solid fa-play"></i> Run Discount </a> </li>
                        @endcan
      
                      </div>
                    </div>
                  </td> 
          </tr>
          @endforeach   
      
   
 
          </x-slot>
          
          <x-slot name="footer">
            @include('livewire.admin.products.offersModal')
            {{ $this->data->links() }} 
          </x-slot>
          </x-app-table>        
  
</div>
