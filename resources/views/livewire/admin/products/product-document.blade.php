<div >

<div  wire:ignore.self class="modal fade" id="ProductDomModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header"> 
          
          <p class="modal-title fs-3" id="deleteModel">  </p>
        </div>
        <div class="modal-body" >
            <div class="container mt-5 mb-3" >
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="row  justify-content-between">     
                             <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" class="layout-logo" >   
                            @foreach($products as $row)
  
                                <h3 class="layout-title" >
                    
                                </h3>
                              <div class="layout-header">
                                <div class="visible-print qr-code">   
                            {{  QrCode::size(50)->generate( $row->name);}}   
                                 </div>

                               <h6> <i class="fa-brands fa-product-hunt"></i> Product Name :
                                {{$row->name}}   </h6> 
                               <h6><i class="fa-solid fa-clipboard-check"></i> Product Type : 
                                {{$row->type->name}}  
                                </h6> 
                               <h6><i class="fa-brands fa-sourcetree"></i>  Product Source :
                                {{$row->source->source_name}}
                               </h6>
                               <hr>
                               <h6><i class="fa-solid fa-clock"></i> Available Date :  
                                {{$row->availableDate}}
                               </h6>
                               <h6><i class="fa-solid fa-puzzle-piece"></i> Divisablity: 
                                @if($row->divisablity==0)
                                  NO
                                @endif 
                                @if( $row->divisablity==1)
                                YES
                              @endif 
                               </h6>
                              </div>
                              @endforeach 

                            </div>
                            <br>
                            <br>
                            @foreach($products as $row)
                            <div class="col-md-12">
                                 <div class="row justify-content-center">  
                                   @foreach($row->getMedia('products') as $image)
                                     <div class="col-4">
                                       <img class="layout-image" src="{{ asset($image->getUrl()) }}">
                                     </div>
                                   @endforeach   
                               </div>
                             </div>
                            @endforeach
                                   <br>
                                   <hr>
                                   <table id="example1" class="table table-white table-hover table-sm table-bordered" >
                                       <thead class="custom-table-header">
                                       <tr>
                                           <th> serial </th>
                                         <th> Item Code </th>
                                         <th> Quantity </th>
                                         <th> Name</th>
                                         <th> QR code </th>
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
                                         <td>{{$row->quantity}}</td>
                                         <td>{{$row->descripation}}</td>
                                         <td>  
                                 {{-- <div class="visible-print">    --}}
                                 
                                  {{  QrCode::size(50)->generate( $row->item_code);}}   
                                 {{-- </div> --}}
                                </td> 
                                         <td>{{$row->item_color}}</td>
                                         <td>{{$row->component_name}}</td>
                                         <td>{{$row->price->dealler_price}}</td>
                                         <td>{{$row->price->special_discount}}</td>
                                         <td>{{$row->price->end_after_discount}}</td>
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
                                              
                                         {{$totalPrice}} EGP 
                                           </td>
                                            </tr>
                                             <tr> 
                                          <th scope="row" colspan="11" > set consists of : 
                                              @foreach($selected as $key =>$row)
                                            <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
                                            @endforeach
                                          </th>
                                       
                                            </tr>
                                         </tfoot>
                                       </table>
                                   <div class="address p-3">
<br>
@foreach($products as $key => $product)
<div class="layout-footer">
  <h6> <i class="fa-solid fa-note-sticky"></i> Notes :
    </h6> 
  <h6> <i class="fa-solid fa-money-bill-wave"></i> 
   Dealler price does not include VAT
   </h6> 
   <h6> <i class="fa-solid fa-money-bill-wave"></i> 
    Enduser price include VAT
     </h6> 
     <h6>
      <i class="fa-solid fa-cubes-stacked "></i> materials : 
      @foreach($product ->item_material as $key => $mat)
        {{$mat}}
      @endforeach
    </h6>
    @if($product->type_id ==1)
      <div>
    <h6> <i class="fa-brands fa-slack"></i> Fabric: {{$product ->fabric}}</h6>
    <h6> <i class="fa-solid fa-bandage"></i> Sponge: {{$product ->sponge}}</h6>
    <h6>  <i class="fa-solid fa-ticket-simple"></i> Sponge Thickness: {{$product ->sponge_thickness}}</h6>
    <br>
      </div>
    @endif
    </div>
    @endforeach
                          </div>
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  </div>
</div>


