 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title> products PDF </title>
		
		<style>
			@media print {
			
					@page { size: auto;  margin: 0mm; }
				
			}
			ul {
				padding: 0;
				margin: 0 0 1rem 0;
				list-style: none;
    
			}
			body {
				font-family: "Inter", sans-serif;
				margin: 0;
        padding: 0;

			}
			table {
				width: 95%;
				border-collapse: collapse;
			}
			table,
			table th,
			table td {
				border: 1px solid silver;
			}
			table th,
			table td {
				text-align: center;
				padding: 8px;
        color: #002659;
 
			}
			h1,
			h4,
			p {
				margin: 0;
			}
      

    .layout-image{
    width:25%;
    height: 20%;
    display:inline-block;
    float: left;
    margin-left: 5%;
    margin-top: 2%;
    margin-bottom: 2%;
    border-radius: 10px;
   
 }
 .qr-code{
position: absolute;
left:80%;
bottom: 5%;
}


.layout-logo{
    margin: 30px;
    width: 100px;
    height: 50px;
    position: absolute;
    left: 10px;
    top: -10px;
}

.continer{
  margin-top:10%;
  width: 95%;
  height:100vh;
  margin-left: 2.5%; 
  border: 1px solid rgb(204, 206, 204);
  box-shadow: 1px 1px 8px rgb(168, 167, 167);
  position: relative;
}
.layout-header{
    width: 25%;
    height: 20%;
    text-align:start;
    font-style: italic;
    font-size: 17px;
    font-weight: 500;
     color: #002659;
    float: right;
}


.gallary{
  width: 95%;
  height:20%;
  margin-left: 2.5%; 
  border: 1px solid rgb(204, 206, 204);
  box-shadow: 1px 1px 8px rgb(168, 167, 167);
  position: relative;
}
.layout-footer{
    width: 25%;
    height:20%;
    text-align:start;
    font-style: italic;
    font-size: 17px;
    font-weight: 500;
    color: #002659;
    margin-left: 15%;
     
}

		</style>
	</head>
	<body>
    <div class="continer mt-5 mb-3" >
      <div class="col-md-12">
          <div class="card">
              <div class="row  justify-content-between">     
               <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" class="layout-logo" >

       <div>
                {{-- <div class="layout-header">
                  <div class="visible-print qr-code">   
                    {{QrCode::size(50)->generate($products->name); }}
                   </div>
                   <h6><i class="fa-solid fa-clock"></i> Available Date :  
                    {{$products->available_date}}
                   </h6>
                   <h6><i class="fa-solid fa-puzzle-piece"></i> Divisablity: 
                    @if($products->divisablity==0)
                      NO
                    @endif 
                    @if( $products->divisablity==1)
                    YES
                  @endif  --}}
                   </h6>   
              </div>


              <div class="layout-footer">
              
                {{-- <h6> <i class="fa-brands fa-product-hunt"></i> Product Name :
                  {{$products->name}}   </h6> 
                 <h6><i class="fa-solid fa-clipboard-check"></i> Product Type : 
                  {{$products->type->name}}  
                  </h6> 
                  <h6><i class="fa-brands fa-sourcetree"></i>  Product Source :
                    {{$products->source->source_name}}
                   </h6>
                   --}}
                 </div>
            </div>

              <div class="gallary ">
                   <div class="row justify-content-center">  
                     {{-- @foreach($products->getMedia('products') as $image)
                       <div>
                         <img class="layout-image" src="{{ asset($image->getUrl()) }}">
                       </div>
                     @endforeach    --}}
                 </div>
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
                             {{-- @foreach($data as $row)
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
                         @endforeach --}}
                         </tbody>
                          
                         <tfoot class="custom-table-footer"> 
                          <tr> 
                        <th scope="row" colspan="8" > End user total price set:
                        
                          @php
                            $totalPrice = 0;
                          @endphp
                          {{-- @foreach($data as $key => $row)
                          @php
                              $totalPrice = $row->price->end_after_discount * $row->quantity;
                              @endphp
                          @endforeach
                            
                       {{$totalPrice}} EGP  --}}
                         </th>
                          </tr>
                           <tr> 
                        <th scope="row" colspan="10" > set consists of : 
                            {{-- @foreach($data as $key =>$row)
                          <h6 style="display: inline-block">{{$row->quantity ." ".$row ->component_name." ".$row -> item_width." "."CM."}}  </h6>
                          @endforeach --}}
                        </th>
                     
                          </tr>
                       </tfoot>
                </table>
           
                <div class="continer">
                  <div class="layout-header">
                    <h6> <i class="fa-solid fa-money-bill-wave"></i> 
                      Dealler price does not include VAT
                      </h6> 
                      <h6> <i class="fa-solid fa-money-bill-wave"></i> 
                       Enduser price include VAT
                        </h6> 
                        <h6>
                         <i class="fa-solid fa-cubes-stacked "></i> materials : 
                         {{-- @foreach($products ->item_material as $key => $mat)
                           {{$mat}}
                         @endforeach --}}
                       </h6>
                    
                </div>
  
  
                <div class="layout-footer">
{{--         
                    @if($products->type_id ==1)
                      <div>
                    <h6> <i class="fa-brands fa-slack"></i> Fabric: {{$products ->fabric}}</h6>
                    <h6> <i class="fa-solid fa-bandage"></i> Sponge: {{$products ->sponge}}</h6>
                    <h6>  <i class="fa-solid fa-ticket-simple"></i> Sponge Thickness: {{$products ->spongeThickness}}</h6>
                      </div>
                    @endif --}}
      
                   </div>
              </div>
  
   
            
	</body>
</html>



