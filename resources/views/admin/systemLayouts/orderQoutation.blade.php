 <x-print-layout title="product details">
  <x-slot name="content">  
    <div class="layout-section">
      
      <div class="box">
       <div class="line"> 
         <i class="fa-brands fa-product-hunt"></i> <span class="title"> Product Name </span>
         <span class="system-feedback">
          {{$products->name}} 
          </span> 
        </div>
     
         <div class="line">
          <i class="fa-solid fa-clipboard-check"></i>  <span class="title"> Product Type </span>
          <span class="system-feedback">
           {{$products->type->name}}  
           </span>
         </div> 
         @can('view product source ')
          <div class="line"><i class="fa-brands fa-sourcetree"></i>  <span class="title"> Product Source 
           </span>

          
           <span class="system-feedback">
           {{$products->source->name}}
           </span>
          </div>
          @endcan
          
     
          <div class="line"><i class="fa-solid fa-puzzle-piece"></i> <span class="title">Divisablity </span>
           @if($products->divisablity==0)
           <span class="system-feedback">
             No Divisibility
             </span>
           @endif 
           @if( $products->divisablity==1)
           <span class="system-feedback">
             Divisible
             </span>
     
         @endif 
          </div>  
     
       </div>
      </div>
    </div>
      
     
         
     
           <div class="gallary ">
             <div >  
               @foreach($products->getMedia('products') as $image)
                 <div>
                   <img class="layout-image" src="{{ asset($image->getUrl()) }}">
                 </div>
               @endforeach   
           </div>
         </div> 
     
       
     
     
          <table id="example1" class="table table-white table-hover table-sm table-bordered"  style="width: 94%; margin-left:3%;">
           <thead style="background-color: #d0d1d3 ;">
           <tr>
               <th> serial </th>
             <th> Item Code </th>
             <th> Name</th>
             <th> item color</th>
             <th> components</th>
             <th> Dealler price</th>
             <th> Enduser price before Extra discount </th>
             <th> Enduser price with discount </th>
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
               <td>{{$i}}</td>
             <td>{{$row->item_code}}</td>
             <td>{{$row->descripation}}</td>
             <td>{{$row->item_color}}</td>
             <td>{{$row->component_name}}</td>
             <td>{{ number_format($row->price->original_price * $row->quantity, 0, '.', ',')}}</td>
             <td>{{ number_format($row->price->final_price * $row->quantity, 0, '.', ',')}}</td>
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
           </tr>
           @endforeach
           </tbody>
            
           <tfoot class="custom-table-footer"> 
            <tr> 
          <th scope="row" colspan="10" > End user total price set:
        
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
           </th>
            </tr>
             <tr> 
          <th scope="row" colspan="10" > set consists of : 
              @foreach($data as $key =>$row)
            <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
            @endforeach
          </th>
       
            </tr>
         </tfoot>
        </table>
      <hr>
      
     <div class="layout-section">
       <div class="visible-print qr-code">   
         {{QrCode::size(50)->generate($products->name)}}
        </div>
     
       <div class="box">
     
         <div class="line">
           <span class="system-feedback"> Dealler price does not include VAT meanwhile  Enduser price include VAT</span> 
           
           </div> 
           
            
         <div class="line">
           <i class="fa-solid fa-cubes-stacked "></i> <span class="title"> Materials  </span>  
           @foreach($products->materials()->get() as $mat )
           {{$mat->name ." "." ,"}}
           @endforeach
        </div>
     
        
      @if($products->type_id ==1)
     
     <div class="line"> 
       <i class="fa-brands fa-slack"></i> 
       <span class="title"> Fabric</span> 
       <span class="system-feedback"> {{$products ->fabric}}</span> 
     </div>
     
     <div class="line"> 
       <i class="fa-brands fa-slack"></i> 
       <span class="title"> cushion number and color</span> 
       <span class="system-feedback"> {{$products ->coshin_number}}  {{$products ->coshin_color}} </span> 
     </div>
     
     
     
     <div class="line">  <i class="fa-solid fa-ticket-simple"></i> 
       <span class="title">Sponge Thickness</span>
       <span class="system-feedback"> {{$products ->sponge_thickness}}</span>
     </div>
     
     @if($products ->chair_added == 0)
     <div class="line">  <i class="fa-solid fa-cart-plus"></i>
       <span class="title">  Extra chair</span>
       <span class="system-feedback"> No can't be added</span>
     </div>
     @elseif($products ->chair_added == 1)
     <div class="line">  <i class="fa-solid fa-cart-plus"></i>
       <span class="title">  Extra chair </span>
       <span class="system-feedback"> Yes can be added</span>
      @endif
      </div>
     @endif
     </div>
     
     </div>
     
       </div>  
       </div>

  </x-slot>
 </x-print-layout>
 
 