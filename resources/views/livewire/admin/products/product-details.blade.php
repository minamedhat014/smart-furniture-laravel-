 <div>
 
 @php
              $product = App\Models\product::where('id',$id)->first();
                $product_name = $product->sku 
             @endphp

<x-app-table name="{{$product_name}}" wire:poll="data">
  <x-slot name="header">

    @can('write product')
<x-table-button icon="fa-solid fa-circle-plus" target="ProductDetailsAddModel" />
     @endcan

  </x-slot>
  
  <x-slot name="head">
    
                <th>Item serial</th>
                <th> Product name</th>
                <th> Product sku </th>
                <th> Item code</th>
                <th col-3> Description </th>
                <th> Quantity </th>
                <th> Item Dimenssions W-H-D </th>

                @can('view dealler prices')
                <th> Dealler Price</th>
                @endcan

                <th> Eenduser price before offers </th>
                <th> Eenduser final price </th>
                @can('write product')
                <th> Actions </th>
                @endCan
  </x-slot>

  <x-slot name="body">
@php
$i=0;
@endphp
    @foreach($this->data as $row)

@php
$i++;
@endphp

    <tr>
   <td>
      @if ($row ->set ==1 )
      <span class="dot-in ml-3"></span> 
      @else  
      <span class="dot-out ml-3"></span>  
      @endif
     {{$i}}
   </td>
      <td>{{$row->product->name}}</td>
      <td>{{$row->product->sku}}</td>
      <td>{{$row->item_code}}</td>
      <td>{{$row->descripation}}</td>
      <td>{{$row->quantity}}</td>
      <td>{{$row->item_width}}- {{$row->item_hieght}}- {{$row->item_out_depth}}</td>
  
   
       @can ('view dealler prices')
      <td>{{number_format($row->price?->original_price * $row->quantity, 0, '    .   ', ','  ) }} EGP 
       @endcan
       
      </td>
      
      <td>
        {{number_format($row->price?->final_price * $row->quantity, 0, '    .   ', ',' ) }} EGP
      </td> 
      
      <td>
        @php
        $totalPrice =0;
        $discountsum =0;
        $discountAmount=0;

        foreach ($row->price->discounts()->get() as $discount) {
              $discountsum += $discount->discount_percentage;
            }
          $totalPrice += $row->price->final_price * $row->quantity;
          $discountAmont= $totalPrice * $discountsum ;
          $finalPrice = $totalPrice -  $discountAmont;
         @endphp

     {{number_format($finalPrice, 0, '   . ' , ',' ) }} EGP

      </td> 

         <td>
          @can('write product')
          <div>
            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
              Actions
            </button>
            <div class="dropdown-menu">
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#ProductDetailsAddModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-copy"></i> Copy to new </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#ProductDetailsEditModel" type="button" wire:click="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
            <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteProductsDetailsModel" type="button"  wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
            <li><a  class="dropdown-item" type="button"  wire:click='removeSet({{$row->id}})'> <i class="fa-solid fa-list-check"></i> Remove From Set </a></li>
            <li><a class="dropdown-item" type="button"  wire:click='AddToSet({{$row->id}})'> <i class="fa-solid fa-circle-plus"></i> Add To Set </a></li>
            </div>
          </div>
      </td> 
     @endCan
    </tr>
    @endforeach   
    </tbody>
      <tfoot class="custom-table-footer"> 
        <tr> 
      <th scope="row" colspan="10" > Enduser total price  for set 
       with available offers 
      @foreach ($product->offers as $offer)
      <span class="badge bg-success"> 
        {{$offer->name}} 
        @if($offer->discount)
        - {{$offer->discount->discount_percentage*100}} % off
        @endif 
        </span>
      @endforeach
      </th>
       <td colspan="2" style="text-align: center">

        @php
       $totalPrice =0;
       $discountsum =0;
       $discountAmount=0;

        @endphp

        @foreach($selected as $key => $row)
            @php
            foreach ($row->price->discounts()->get() as $discount) {
              $discountsum += $discount->discount_percentage;
            }
          $totalPrice += $row->price->final_price * $row->quantity;
          $discountAmont= $totalPrice * $discountsum ;
          $finalPrice = $totalPrice -  $discountAmont;
        
      
            @endphp
        @endforeach

     @if($selected->first())
        {{number_format($finalPrice, 0, '   . ' , ',' ) }} EGP

     @endif
       </td>
        </tr>
         <tr> 
      <th scope="row" colspan="12" > set consists of : 
          @foreach($selected as $key =>$row)
        <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
        @endforeach
  </x-slot>
  <x-slot name="footer">  
  </x-slot>
  </x-app-table>
  @include('livewire.admin.products.product-detailsModal') 
</div>








  
  














