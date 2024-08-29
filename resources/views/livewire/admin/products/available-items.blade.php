<div>
    <x-app-table name="List of Available items">
    
      <x-slot name="header">
     @can('upload avialable')
    <x-table-button icon="fa-solid fa-file-upload"  target="uploaditems" />
    @endcan

    @can('download available')
     <button class="table-select btn-outline-secondary" wire:click="export" >
      <i class="fa-solid fa-file-download"></i> 
     </button>
    @endcan

      </x-slot>
      
      <x-slot name="head">

        <th> serial </th>
        <th> last update </th>
        <th> Product name </th>
        <th class="col-2"> Product SKU </th>
        <th class="col-2"> Item code  </th>
        <th class="col-2"> Item description  </th>
        <th> Component name</th>
        <th> Available quantity </th> 
        <th > Consumption rate per week </th>
        <th class="col-2" > Available date </th>
        <th class="col-2"> Actions </th>
      </x-slot>
      @php
          $i=0;
      @endphp
      <x-slot name="body">
       @foreach ($this->data as  $row)
        @php
        $i++
        @endphp
           <tr>
            <td>
              {{$i}}
            </td>
            <td>
              <span class="badge bg-warning"> 
              {{$row->balance?->created_at->diffForHumans()}}
              </span>
            </td>
            <td>
              {{$row->product->name}}
            </td>
            <td>
              {{$row->product->sku}}
            </td>
            <td>
              {{$row->item_code}}
            </td>
            <td>
              {{$row->descripation}}
            </td>
            <td>
              {{$row->component_name}}
            </td>
           
            <td>
              {{$row->balance?->balance}}
            </td>
            <td>
              {{$row->balance?->consumption_rate_per_week}}
            </td>
            <td>
              {{$row->balance?->available_date}}
            </td>
            <td> 
              @can('edit or delete avilable')
              <a data-bs-toggle="modal" data-bs-target="#editModal" type="button" wire:click='edit({{$row->id}})' class="btn btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
              <a data-bs-toggle="modal" data-bs-target="#deleteModal"  wire:click='gettingItemId({{$row->id}})' type="button" class="btn btn-outline-secondary"  > <i class="fa-solid fa-trash danger"></i></a>
             @endCan          
            </td>       

           </tr>
       @endforeach
      </x-slot>
      
      <x-slot name="footer">
        {{ $this->data->links() }} 
      </x-slot>
      </x-app-table>
      
      @include('livewire.admin.products.availableModal')
      </div>
      
    
      
    