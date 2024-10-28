<div>
  
    <x-app-table name="List of Products">
    
      <x-slot name="header">
    @can('view product source ')
    <x-table-select fname="Source" bname="sourceFilter" :options="$sources" value="id"/>
   
    <x-table-select fname="Status filter" bname="statusFilter" 
    :options="[['id' => 1, 'name' => 'Not launched'],['id' => 2, 'name' => 'standing'],['id' => 3, 'name' => 'cancelled']]" value="id"/> 
    @endcan
    
    @can('write product')
    <x-table-button icon="fa-solid fa-circle-plus" target="addProductsModel" />
    @endCan

    @can('export products')
    <x-table-button icon="fa-solid fa-file-download " target="Download" />
    @endCan

      </x-slot>
      
      <x-slot name="head">
        <th scope='col'>ID</th>
        <th scope='col-2'> Created at</th>
        <th scope='col'> Name</th>
        <th scope='col'> SKU </th>
        <th scope='col'> Type</th>
        <th scope='col'> Standard or not </th>
        <th scope='col'> Warranty years </th>
        @can('view product source')
        <th scope='col'> Source</th>
        @endcan
        
        <th scope='col-2'> image </th>
        <th scope='col-2'> Offers </th>
        <th scope='col-2'> product Materials</th>
        <th scope='col-2'> Poduct status</th>
        <th scope='col-2'> Actions </th>
      </x-slot>
      
      <x-slot name="body">
        @foreach ($this->data as $row)
        <tr>
        <td>{{$row->id}}</td>
        <td>{{onlyDate($row->created_at)}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->sku}}</td>
        <td>{{$row->type?->name}}</td>
        <td>
          @if($row->Standard_ability == 0)
          <span class="badge bg-secondary"> Non Standard </span>
         @elseif($row->Standard_ability == 1)
        <span class="badge bg-success"> Standard  </span>
            @endif
        </td>
        <td>
          {{$row->warranty_years}} 
        </td>
        @can('view product source')
        <td>{{$row->source?->name}}</td>
        @endcan
        <td>
          <img src="{{$row->getFirstMediaUrl('products','thumb')}}" alt="{{ $row->name }}" class="noti-image">
        </td>
        <td>

       
          @if($row->offers->isNotEmpty())
        
          @foreach($row->offers()->get() as $key => $ro)
          <span class="badge bg-success"> 
          {{$ro->name}}
          </span>
          @endforeach
          @else
          <span class="badge bg-danger"> 
            no offers applied 
            </span>
          @endif
          </td>

        <td>
        @foreach($row->materials()->get() as $key => $ro)
        <span class="badge bg-warning"> 
        {{$ro->name}}
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
          <div>
            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
              Actions
            </button>
            <div class="dropdown-menu">
              @can('write product')
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editProductsModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addProductsModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-copy"></i> Copy to new </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsModel" type="button"  wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
              @endcan 
              <li><a class="dropdown-item" href="{{route('itemsDetails',['id'=>$row->id,'type'=>$row->type->id])}}" type="button" target="_blank" > <i class="fa-solid fa-eye"></i> View items </a></li>
               @can('rate products')
              <li><a class="dropdown-item" href="{{route('productReview',['id'=>$row->id])}}"  type="button"  target="_blank" > <i class="fa-solid fa-star"></i> Rate this product</a></li>
              @endcan

              @can('write product')
             <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#ProductLaunchModel" wire:click='productID({{$row->id}})' type="button"> <i class="fa-solid fa-rocket"></i> Launch product </a></li>
             <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#ProductCancelModel" wire:click='productID({{$row->id}})' type="button"> <i class="fa-solid fa-ban"></i> Cancel </a></li>
               @endcan

             <li> <a data-bs-toggle="modal"class="dropdown-item" data-bs-target="#productDisplay" wire:click='productImage({{$row->id}})' type="button"> <i class="fa-solid fa-image"></i> View product images </a></li>
             @can('print product layout')
             <li> <a class="dropdown-item" target="_blank" href="{{route('productPDF',$row->id)}}" type="button"> <i class="fa-solid fa-print" ></i> Print </a></li>
             @endcan
            </div>
          </div>
        </td> 
        </tr>
        @endforeach
      </x-slot>
      
      <x-slot name="footer">
        {{ $this->data->links() }} 
      </x-slot>
      </x-app-table>
      
      @include('livewire.admin.products.productModel')
      </div>
      
    
      
    