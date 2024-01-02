@php
  $name=App\Models\showroom::where('id',$showRoom_id)->first()->name;
@endphp 

<x-app-table name=" List of {{$name}} products ">

  <x-slot name="header">
  <x-table-button icon="fa-solid fa-circle-plus" target="AddshowProductModal" />
  
    </x-slot>
    <x-slot name="head">
      
      <th class="col-2">ID</th>
      <th class="col-2"> Created at</th>
      <th class="col-2"> Product name</th>
      <th class="col-2"> Quantity </th>
      <th class="col-2"> Special offer </th>
      <th class="col-2"> remarks </th>
      <th class="col-2"> Actions </th>

    </x-slot>
    
    <x-slot name="body">
       @foreach($data as $key => $row)
                    <tr>
                       <td> {{$row->id}}</td>
                       <td> {{$row->created_at}}</td>
                       <td> {{$row->product->name}}</td>
                        <td> {{$row->quantity}} </td>
                        <td> {{$row->special_offer}} </td>
                        <td> {{$row->remarks}} </td>
                        <td>

                          <div>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              Actions
                            </button>
                            <div class="dropdown-menu">
                              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editshowProductModal" type="button" wire:click ="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deletshowProductModel" type="button" wire:click ="deleteID({{$row->id}})" ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                            </div>
                          </div>
                      </td> 
                    </tr>
                     @endforeach
    
    </x-slot>
    
    <x-slot name="footer">
      @include('livewire.admin.showrooms.showroom-productsModal')
      {{ $data->links() }}
    </x-slot>
    </x-app-table>
    
    
    


