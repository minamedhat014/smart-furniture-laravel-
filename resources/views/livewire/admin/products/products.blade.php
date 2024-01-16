
<x-app-table name="List of Products">

  <x-slot name="header">
<x-table-select fname="Source" bname="sourceFilter" :options="$sources" value="id"/>
<x-table-select fname="Status filter" bname="statusFilter" 
:options="[['id' => 1, 'name' => 'Not launched'],['id' => 2, 'name' => 'standing'],['id' => 3, 'name' => 'cancelled']]" value="id"/> 
<x-table-button icon="fa-solid fa-circle-plus" target="addProductsModel" />
<x-table-button icon="fa-solid fa-file-download " target="Download" />
  </x-slot>
  
  <x-slot name="head">
    <th scope='col'>ID</th>
    <th scope='col-2'> Created at</th>
    <th scope='col'> Name</th>
    <th scope='col'> Type</th>
    <th scope='col'> Standard Ablitity</th>
    <th scope='col'> Source</th>
    <th scope='col-2'> image </th>
    <th scope='col-2'> product Materials</th>
    <th scope='col-2'> Poduct status</th>
    <th scope='col'> Created by</th>
    <th scope='col-2'> Actions </th>
  </x-slot>
  
  <x-slot name="body">
    @foreach ($data as $row)
    <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->created_at}}</td>
    <td>{{$row->name}}</td>
    <td>{{$row->type->name}}</td>
    <td>
      @if($row->Standard_ability == 0)
      <span class="badge bg-secondary"> Non Standard </span>
     @elseif($row->Standard_ability == 1)
    <span class="badge bg-success"> Standard  </span>
        @endif
    </td>
    <td>{{$row->source->name}}</td>
    <td>
      <img src="{{$row->getFirstMediaUrl('products','thumb')}}" alt="{{ $row->name }}" class="noti-image">
    </td>
    <td>
    @foreach($row->item_material as $mat )
    <span class="badge bg-warning"> 
    {{$mat}}
    </span>
    @endforeach
    </td>
    <td>
    @if($row->status == 3)
    <span class="badge bg-danger"> Cancelled</span>
   @elseif($row->status == 1)
  <span class="badge bg-primary"> Not launched </span>
     @elseif($row->status == 2)
      <span class="badge bg-success">Standing </span>
      @endif
    </td>
    <td>
      {{$row->created_by}}
    </td>
    <td>
      <div>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Actions
        </button>
        <div class="dropdown-menu">
          <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editProductsModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
          <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsModel" type="button"  wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
          <li><a href="{{route('itemsDetails',['id'=>$row->id,'type'=>$row->type->id])}}" wire:navigate  class="dropdown-item" type="button" > <i class="fa-solid fa-circle-plus"></i> Product items </a></li>
          <li><a class="dropdown-item" href="{{route('productReview',['id'=>$row->id])}}" type="button" > <i class="fa-solid fa-star"></i> Rate this product</a></li>
          <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#ProductDomModel"type="button"wire:click="$emit('getProductId',{{$row->id}})" > <i class="fa-solid fa-eye"></i> product details </a></li>
         <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#ProductLaunchModel" wire:click='productID({{$row->id}})' type="button"> <i class="fa-solid fa-rocket"></i> Launch product </a></li>
         <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#ProductCancelModel" wire:click='productID({{$row->id}})' type="button"> <i class="fa-solid fa-ban"></i> Cancel </a></li>
         <li> <a class="dropdown-item" target="_blank" href="{{route('productPDF',$row->id)}}" type="button"> <i class="fa-solid fa-print" ></i> Print </a></li>
        </div>
      </div>
    </td> 
    </tr>
    @endforeach
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.productModel')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  

  



