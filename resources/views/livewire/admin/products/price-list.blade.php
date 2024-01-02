<div>
    {{-- select product --}}
    <div class="feild col-lg-4 col-md-8 col-sm-12 " >
      <label > Please Select product </label>
      <i class="fa-solid fa-filter"></i>
      <select class="feild-select" 
          wire:model.lazy="product_id">
          <option value=""> select </option>
            @foreach($products as  $option)
            <option value="{{$option ->id}}" > {{$option->name ?? ''}}  </option>
            @endforeach
          </select>                 
   </div>

 @if($product_id)

<div class="continer" >
<div class="card bg-light ">
<div class="card-header">
  <div class="row"> 
    @foreach($selected as $key => $row)

    
    <div class=" tag"> Product name: {{$row->name}}</div>
    <div class=" tag"> product type: {{$row->type->name}}</div>

    <div class="tag">
      product material:
       @foreach($row->item_material as $mat )
      {{$mat ." "." ,"}}
      @endforeach
    </div>

    @if($row->divisablity == 1)
    <span class="tag highlight"> Sold sepratly </span>
   @else 
   <span class="tag highlight">  Not Sold sepratly </span>
   @endif

   @if($row->Standard_ability == 1)
   <span class="tag highlight"> Standard </span>
  @else 
  <span class="tag highlight">  Nan standard  </span>
  @endif

  @if($row->type_id ==1 || $row->type_id ==5 || $row->type_id ==6)


    <div class="tag"> Product fabric : {{$row->fabric}}</div>
    <div class="tag"> product sponge: {{$row->sponge}}</div>
    <div class="tag"> product sponge thickness: {{$row->sponge_thickness}}</div>
    <div class="tag"> {{$row->coshin_number}} {{$row->coshin_color}} </div>
    @if($row->chair_added == 1)
    <span class="tag highlight"> A chair can be added </span>
    @else
    <span class="tag highlight"> A chair can not be added </span>
   @endif
 
  @endif
  <br>
<hr>
<div class="row mt-2">

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
    
      @foreach($row->getMedia('products') as $image)
      <div class="carousel-item active ">
        <img src="{{ asset($image->getUrl()) }}" class="corsal-image" alt="..." >
      </div>  
      @endforeach
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon " aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
    @endforeach 
  </div>
</div>
<hr>
<div class="card-body">


    
  <table id="example1" class="table-light table-hover table-sm table-bordered">
    <thead class="custom-table-header">
    <tr>
      <th class="col-1"> serial </th>
      <th class="col-1"> Item Code </th>
      <th class="col-1"> Name</th>
      <th class="col-1"> Included in set </th>
      <th class="col-1"> item color</th>
      <th class="col-1"> components</th>
      <th class="col-2"> tem Dimenssions W-H-D</th>
      <th class="col-2"> Special discount</th>
     <th class="col-1"> Enduser price</th>
    </tr>
    </thead>
    <tbody class="custom-table-body">
      <tr>
        @php
          $i = 0;
    
        @endphp
        @foreach($data as $row)
        @php

            $i++
        @endphp
        <td>{{$i}} </td>
      <td>{{$row->item_code}}</td>
      <td>{{$row->descripation}}</td>
      <td>@if($row->set ===1 ) <i class="fa-regular fa-circle-check" style="color: #31dc2e;"></i> @else <i class="fa-solid fa-circle-xmark" style="color: #f24236;"></i> @endif </td>
      <td>{{$row->item_color}}</td>
      <td>{{$row->component_name}}</td>
      <td>{{$row->item_width}} - {{$row->item_hieght}} - {{$row->item_depth}}</td>
      <td>{{$row->price->special_discount ?? ''}} </td>
      <td>{{ number_format($row->price->end_after_discount, 2, '.', ',') }} EGP </td>
    </tr>
    @endforeach
    </tbody>
     
    <tfoot class="custom-table-footer"> 
     <tr class=" m-3"> 
   <th scope="row" colspan="8" > End user total price set:
    @php
    $totalPrice = 0;
  @endphp
  @foreach($sets as $key => $row)
  @php

    $totalPrice += $row->price->end_after_discount  * $row->quantity;
  
      @endphp
  @endforeach
    
  <td colspan="3" style="text-align: center">
  <span class="badge bg-primary"> {{ number_format($totalPrice, 2, '.', ',')}} EGP  </span>
 </td>
    </th>
     </tr>
      <tr class="m-3"> 
   <th scope="row" colspan="10" > set consists of : 
       @foreach($data as $key =>$row)
     <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
     @endforeach
   </th>

     </tr>
  </tfoot>
 </table>



</div>
</div>
</div>
@endif

</div>


