@php
$offer = App\Models\offer::where('id',$offer_id)->first();
$offer_name = $offer->name
@endphp

<x-app-table name=" {{$offer_name}} ">
  <x-slot name="header">
    
<x-table-button icon="fa-solid fa-circle-plus" target="addofferDetailsModel" />
  </x-slot>
  
  <x-slot name="head">
    
    <th>Product item </th>
    <th> Quantity </th>
    <th> Details </th>
    <th> Orignal price </th>
    <th> Discount </th>
    <th> End user price </th>
    <th> Actions </th>

  </x-slot>
  
  <x-slot name="body">
    @foreach($data as $row)
                                <tr>
                                  <td> {{$row->productItem->item_code }}</td>
                                  <td> {{$row->quantity}}</td>
                                  <td> {{$row->details}} </td>
                                  <td> {{$row->price}}</td>
                                  <td> {{$row->discount*100}}%</td>
                                  <td> {{$row->end_user_price}}</td>
                                 
                                      <td>
                                        <div>
                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            Actions
                                          </button>
                                          <div class="dropdown-menu">
                                           
                                            <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editoffersDetialsModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                                            <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteofferDetailsModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                                          </div>
                                        </div>
                                      </td> 
                              </tr>
                              @endforeach   

  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.offerDetailsModal')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  

  







