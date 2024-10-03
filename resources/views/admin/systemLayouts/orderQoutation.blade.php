<x-print-layout title="Sales qoutation">
  <x-slot name="content">  
    <div class="layout-section">
      

      <div class="box">


        <div class="line"> <i class="fa-solid fa-hashtag"></i>
          <span class="title"> order number </span>
          <span class="system-feedback">      
             {{$order->id}}
           </span>
       </div> 
       <div class="line">
        <i class="fa-solid fa-store"></i>  <span class="title"> branch </span>
        <span class="system-feedback">
         {{$order->store->name}}  
         </span>
       </div> 
        <div class="line"><i class="fa-solid fa-user"></i>  <span class="title"> sales name
         </span>
         <span class="system-feedback">
         {{$order->sales_name}}
         </span>
        </div>

       <div class="line"> <i class="fa-solid fa-calendar"></i>
         <span class="title"> order date </span>
         <span class="system-feedback">      
            {{$order->created_at}}
          </span>
      </div> 
      
    

        </div>


        <div class="box">
         <div class="line"> 
           <i class="fa-solid fa-user"></i> <span class="title"> customer name </span>
           <span class="system-feedback">
            {{$order->customer->name}} 
            </span> 
          </div>
       
        
       
            <div class="line"><i class="fa-solid fa-phone"></i>
             <span class="title"> phones </span>
             @foreach($order->customer->phone as $key => $pho)
             <span class="system-feedback badge">
            {{$pho->number}}  
             </span> 
             @endforeach
            </div> 

            <div class="line"> <i class="fa-solid fa-location-dot"></i>
              <span class="title"> order address</span>
              <span class="system-feedback">      
                {{$order->address->city}} - {{$order->address->address}}
               </span>
           </div> 
            
       
         </div>
        </div>
      </div>
        
       
       
         <table id="example1" class="table table-white table-hover table-sm table-bordered"  style="width: 94%; margin-left:3%;">
             <thead style="background-color: #d0d1d3 ;">
             <tr>
               <th> serial </th>
               <th> Item Code </th>
               <th> Description  </th>
               <th> Quantity </th>
               <th> Original U-price</th>
               <th> Extra dis. </th>
               <th> U-price after Dis.</th>
               <th> Quantity price </th>
               
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
               <td>{{$row->productDetails?->item_code}}</td>
               <td>{{$row->productDetails?->descripation}}
                
                {{$row->productDetails?->item_color}}
                @foreach($row->productDetails?->product?->materials()->get() as $key => $mat)
                <span class="system-feedback badge"> {{$mat->name }}  </span>  
                @endforeach
                  
               
                  </td>
               <td>{{$row->quantity}}</td>
               <td>{{$row->unit_price}}</td>
               <td>{{$row->branch_extra_discount}}</td>
               <td>{{$row->unit_price_after_discount}}</td>
               <td>{{$row->	final_price }}</td>
              
             </tr>
             @endforeach
             </tbody>
              
             <tfoot class="custom-table-footer"> 
              <tr> 
            <th scope="row" colspan="12" > total price :    
           {{$data->sum('final_price')}} EGP 
             </th>
              </tr>
              <tr> 
                <th scope="row" colspan="12" >total quantity :      
               {{$data->sum('quantity')}} items
                 </th>
                  </tr>
           </tfoot>
          </table> 
        <hr>
        
       <div class="layout-section">
         <div class="box">
          <x-order-note>
          </x-order-note>
         </div>  
         </div>
  
  
      
  </x-slot>
 </x-print-layout>
 
 