              @php
              $product = App\Models\product::where('id',$id)->first();
                $product_name = $product->name
             @endphp

<x-app-table name="{{$product_name}}" wire:poll="data">
  <x-slot name="header">
<x-table-button icon="fa-solid fa-circle-plus" target="ProductDetailsAddModel" wire:click="$emit('gettingProductID',{{$id}},'{{$type}}')" />

  </x-slot>
  
  <x-slot name="head">
    
             <th>Item serial</th>
                <th> Product name</th>
                <th class="col-2"> Item code</th>
                <th class="col-2"> Description </th>
                <th> Quantity </th>
                <th class="col-2"> Item Dimenssions W-H-D </th>
                <th> Dealler Price</th>
                <th> Special discount </th>
                <th> Enduser Price </th>
                <th> Actions </th>

  </x-slot>
  
  <x-slot name="body">

    @foreach($data as $row)
    <tr>
   <td>
      @if ($row ->set ==1 )
      <span class="dot-in ml-3"></span> 
      @else  
      <span class="dot-out ml-3"></span>  
      @endif
     {{$row->id}}
   </td>
      <td>{{$row->product->name}}</td>
      <td>{{$row->item_code}}</td>
      <td>{{$row->descripation}}</td>
      <td>{{$row->quantity}}</td>
      <td>{{$row->item_width}}- {{$row->item_hieght}}- {{$row->item_depth}}</td>
      <td>{{$row->price->dealler_price ?? ''}}</td>
      <td>{{$row->price->special_discount ?? '' }} % </td>
      <td>{{number_format($row->price->end_after_discount, 2, '.', ',')}} </td>
      
         <td>

          <div>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              Actions
            </button>
            <div class="dropdown-menu">
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#ProductDetailsEditModel" type="button" wire:click="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
            <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsDetailsModel" type="button"  wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
            <li><a  class="dropdown-item" type="button"  wire:click='removeSet({{$row->id}})'> <i class="fa-solid fa-list-check"></i> Remove From Set </a></li>
            <li><a class="dropdown-item" type="button"  wire:click='AddToSet({{$row->id}})'> <i class="fa-solid fa-circle-plus"></i> Add To Set </a></li>
            </div>
          </div>
      </td> 
    </tr>
    @endforeach   
    </tbody>
      <tfoot class="custom-table-footer"> 
        <tr> 
      <th scope="row" colspan="8" > End user total price set</th>
       <td colspan="3" style="text-align: center">
        @php
          $totalPrice = 0;
        @endphp
        @foreach($selected as $key => $row)
        @php
  
          $totalPrice += $row->price->end_after_discount * $row->quantity;
        
            @endphp
        @endforeach
          
        {{number_format($totalPrice, 2, '.', ',')}} EGP
       </td>
        </tr>
         <tr> 
      <th scope="row" colspan="11" > set consists of : 
          @foreach($selected as $key =>$row)
        <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
        @endforeach
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.product-details-modal')
  </x-slot>
  </x-app-table>
  
  
  




  
  














