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
          <div class="line"><i class="fa-brands fa-sourcetree"></i>  <span class="title"> Product Source 
           </span>
           <span class="system-feedback">
           {{$products->source->name}}
           </span>
          </div>
     
          <div class="line"><i class="fa-solid fa-clock"></i>
           <span class="title"> Available Date </span>
           <span class="system-feedback">
            {{$products->available_date}}
            </span>
          </div class="line">
     
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
             <th> Special discount</th>
            <th> Enduser price</th>
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
             <td>{{$row->price->dealler_price ?? ''}}</td>
             <td>{{$row->price->special_discount ?? ''}}</td>
             <td>{{$row->price->end_after_discount ?? ''}}</td>
           </tr>
           @endforeach
           </tbody>
            
           <tfoot class="custom-table-footer"> 
            <tr> 
          <th scope="row" colspan="8" > End user total price set:
          
            @php
              $totalPrice = 0;
            @endphp
            @foreach($data as $key => $row)
            @php
                $totalPrice = $row->price->end_after_discount * $row->quantity;
                @endphp
            @endforeach
              
         {{$totalPrice}} EGP 
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
         {{QrCode::size(50)->generate($products->name); }}
        </div>
     
       <div class="box">
     
         <div class="line">
           <span class="system-feedback"> Dealler price does not include VAT meanwhile  Enduser price include VAT</span> 
           
           </div> 
           
            
         <div class="line">
           <i class="fa-solid fa-cubes-stacked "></i> <span class="title"> Materials  </span>  
          @foreach($products ->item_material as $key => $mat)
          <span class="system-feedback"> {{$mat}} , </span>  
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
 
 