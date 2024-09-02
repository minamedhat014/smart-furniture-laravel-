<div>
  <x-appToaster/>

<div>
    @php
    $product = App\Models\product::where('id',$product_id)->first();
    $product_name = $product->name
  @endphp
  product name : <span class="badge bg-primary"> {{$product_name}} </span>
 
</div>
<br>


@if($data->isEmpty())



    <form wire:submit="store" autocomplete="off" >
      @csrf
      <button type="submit" hidden> </button>
      <div class="row">

       {{-- price rating  --}}

       <div class="survey-box col-sm-3 ml-5 mb-5" id="box-2">
                          <h5> Rate product price </h5>
                         
                        <div class="emoje-box">
                             <i class="fa-regular fa-angry emoje"></i>
                             <i class="fa-regular fa-meh emoje"></i>
                             <i class="fa-regular fa-smile emoje"></i>
                             <i class="fa-regular fa-face-grin-stars emoje"></i>
                             <i class="fa-regular fa-face-grin-hearts emoje"></i>
                       </div>
                  
                           <div class="survey-rate">
                           <input  hidden type="radio" id="reviewprice1"  value="1"  wire:model="price_scale" />
                           <label for="reviewprice1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                     
                           <input hidden type="radio" id="reviewprice2"  value="2"  wire:model="price_scale"/>
                           <label for="reviewprice2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice3"  value="3"  wire:model="price_scale"/>
                           <label for="reviewprice3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice4"  value="4"  wire:model="price_scale"/>
                           <label for="reviewprice4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice5"  value="5"  wire:model="price_scale"/>
                           <label for="reviewprice5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                           </div>
                       
                          <input type="text" class="rate-input" placeholder=" Add comment" wire:model="price_recomendation" >
                          @error('price_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
                          </div>
    
    
                          {{-- material rate  --}} 
    
                          <div class="survey-box col-sm-3 ml-5 mb-5 " id="box-3">
                            <h5> Rate product materials </h5>
                            
                          <div class="emoje-box">
                            <i class="fa-regular fa-angry emoje"></i>
                            <i class="fa-regular fa-meh emoje"></i>
                            <i class="fa-regular fa-smile emoje"></i>
                            <i class="fa-regular fa-face-grin-stars emoje"></i>
                            <i class="fa-regular fa-face-grin-hearts emoje"></i>
                         </div>
                    
                             <div class="survey-rate">
                             <input  hidden type="radio" id="reviewmaterial1"  value="1"  wire:model="material_scale" />
                             <label for="reviewmaterial1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                       
                             <input hidden type="radio" id="reviewmaterial2"  value="2"  wire:model="material_scale"/>
                             <label for="reviewmaterial2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial3"  value="3"  wire:model="material_scale"/>
                             <label for="reviewmaterial3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial4"  value="4"  wire:model="material_scale"/>
                             <label for="reviewmaterial4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial5"  value="5"  wire:model="material_scale"/>
                             <label for="reviewmaterial5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                             </div>
                         
                            <input type="text" class="rate-input" placeholder=" Add comment" wire:model="material_recomendation" >
                            @error('material_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
                            </div>
      
    
       {{-- colors rate  --}} 
      
       <div class="survey-box col-sm-3 ml-5 mb-5 " id="box-4">
        <h5> Rate product color </h5>
       
      <div class="emoje-box">
        <i class="fa-regular fa-angry emoje"></i>
        <i class="fa-regular fa-meh emoje"></i>
        <i class="fa-regular fa-smile emoje"></i>
        <i class="fa-regular fa-face-grin-stars emoje"></i>
        <i class="fa-regular fa-face-grin-hearts emoje"></i>
     </div>
    
         <div class="survey-rate">
         <input  hidden type="radio" id="reviewcolor1"  value="1"  wire:model="colors_scale" />
         <label for="reviewcolor1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor2"  value="2"  wire:model="colors_scale"/>
         <label for="reviewcolor2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor3"  value="3"  wire:model="colors_scale"/>
         <label for="reviewcolor3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor4"  value="4"  wire:model="colors_scale"/>
         <label for="reviewcolor4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor5"  value="5"  wire:model="colors_scale"/>
         <label for="reviewcolor5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
         </div>
     
        <input type="text" class="rate-input" placeholder=" Add comment" wire:model="colors_recomendation" >
        @error('colors_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
        </div>


      {{-- design rate  --}}

        <div class="survey-box col-sm-3 ml-5 mb-5" id="box-5">
          <h5> Rate product design </h5>
         
        <div class="emoje-box">
          <i class="fa-regular fa-angry emoje"></i>
          <i class="fa-regular fa-meh emoje"></i>
          <i class="fa-regular fa-smile emoje"></i>
          <i class="fa-regular fa-face-grin-stars emoje"></i>
          <i class="fa-regular fa-face-grin-hearts emoje"></i>
       </div>
      
           <div class="survey-rate">
           <input  hidden type="radio" id="reviewdesign1"  value="1"  wire:model="design_scale" />
           <label for="reviewdesign1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign2"  value="2"  wire:model="design_scale"/>
           <label for="reviewdesign2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign3"  value="3"  wire:model="design_scale"/>
           <label for="reviewdesign3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign4"  value="4"  wire:model="design_scale"/>
           <label for="reviewdesign4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign5"  value="5"  wire:model="design_scale"/>
           <label for="reviewdesign5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
           </div>
       
          <input type="text" class="rate-input" placeholder=" Add comment" wire:model="design_recomendation" >
          @error('design_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
          </div>
    
             
      {{-- general rate  --}}

        <div class="survey-box col-sm-3 ml-5 mb-5" id="box-6">
          <h5> Rate this product in general </h5>
         
        <div class="emoje-box">
          <i class="fa-regular fa-angry emoje"></i>
          <i class="fa-regular fa-meh emoje"></i>
          <i class="fa-regular fa-smile emoje"></i>
          <i class="fa-regular fa-face-grin-stars emoje"></i>
          <i class="fa-regular fa-face-grin-hearts emoje"></i>
       </div>
      
           <div class="survey-rate">
           <input  hidden type="radio" id="reviewgeneral1"  value="1"  wire:model="general_scale" />
           <label for="reviewgeneral1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral2"  value="2"  wire:model="general_scale"/>
           <label for="reviewgeneral2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral3"  value="3"  wire:model="general_scale"/>
           <label for="reviewgeneral3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral4"  value="4"  wire:model="general_scale"/>
           <label for="reviewgeneral4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral5"  value="5"  wire:model="general_scale"/>
           <label for="reviewgeneral5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
           </div>
          <button class="rate-input bg-success" type="submit" > submit </button>
          </div>
  

      </div>   
    </form>
@else
<div class="row">
  @include('livewire.admin.products.ratingModal')

<span class="mb-5"> you have already rated this product as the following : </span>

<table  class="table-primary text-center">
  <thead>
    <tr>
      <td colspan="4"> Rated elements </td>
      <td colspan="4"> Rating score</td>
      <td colspan="4"> Comments </td>
    </tr>
  </thead>
<tbody class="custom-table-footer">
  <tr >
    <td colspan="4"> price rating </td>
    <td colspan="4">
      @php 
      foreach($data as $row){
     $priceRating = $row['price_scale'];
      }
      
      @endphp  
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>
    
            @if($priceRating >0)
                @if($priceRating >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
            @php $priceRating--; @endphp
        </span>
    @endforeach
    </td>
    <td>
      @php 

      foreach($data as $row){
     $price_comment = $row['price_recomendation'];
      }  
      @endphp  
    {{$price_comment}}
    </td>
  </tr>

  

  <tr>
    <td colspan="4"> material rating </td>
    <td colspan="4">
      @php 
      foreach($data as $row){
     $Rating1 = $row['material_scale'];
      }
      
      @endphp  
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>
    
            @if($Rating1 >0)
                @if($Rating1 >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
            @php $Rating1--; @endphp
        </span>
    @endforeach
    </td>
    <td>
      @php 

      foreach($data as $row){
     $comment = $row['material_recomendation'];
      }  
      @endphp  
    {{$comment}}
    </td>
  </tr>

  <tr>
    <td colspan="4"> color rating </td>
    <td colspan="4">
      @php 
      foreach($data as $row){
     $Rating2 = $row['colors_scale'];
      }
      
      @endphp  
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>
    
            @if($Rating2 >0)
                @if($Rating2 >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
            @php $Rating2--; @endphp
        </span>
    @endforeach
    </td>
    <td>
      @php 

      foreach($data as $row){
     $comment = $row['colors_recomendation'];
      }  
      @endphp  
    {{$comment}}
    </td>
  </tr>


  <tr>
    <td colspan="4"> design rating </td>
    <td colspan="4">
      @php 
      foreach($data as $row){
     $Rating3 = $row['design_scale'];
      }
      
      @endphp  
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>
    
            @if($Rating3 >0)
                @if($Rating3 >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
            @php $Rating3--; @endphp
        </span>
    @endforeach
    </td>
    <td>
      @php 

      foreach($data as $row){
     $comment = $row['design_recomendation'];
      }  
      @endphp  
    {{$comment}}
    </td>
  </tr>


  <tr>
    <td colspan="4"> general rating </td>
    <td colspan="4">
      @php 
      foreach($data as $row){
     $Rating4 = $row['general_scale'];
      }
      
      @endphp  
    @foreach(range(1,5) as $i)
        <span class="fa-stack" style="width:1em">
            <i class="far fa-star fa-stack-1x"></i>
    
            @if($Rating4 >0)
                @if($Rating4 >0.5)
                    <i class="fas fa-star fa-stack-1x"></i>
                @else
                    <i class="fas fa-star-half fa-stack-1x"></i>
                @endif
            @endif
            @php $Rating4--; @endphp
        </span>
    @endforeach
    </td>
    <td>
      
    </td>
  </tr>

</tbody>
<div class="row mb-5 justify-content-end">
  
  <div class="col-2 ">

    <button type="button" class="btn btn-outline-light"  wire:click="deleteID({{$row->id}})" data-bs-toggle="modal" data-bs-target="#deleteRatingModel">
      <i class="fa-sharp fa-solid fa-trash"></i>
    </button> 

    <button type="button" class="btn btn-outline-ligh"  wire:click="edit({{$row->id}})"   data-bs-toggle="modal" data-bs-target="#EditpriceRate">
      <i class="fa-sharp fa-solid fa-pen"></i>
    </button> 
   </div>
  
</div>
</table>
 </div>   
@endif


</div>


@push('js-scripts')



<script>
  let starsELment2=document.querySelectorAll("#box-2 .fa-star");
  let emojiElemt2=document.querySelectorAll("#box-2 .fa-regular")
  let colorsArray=["red","orange","darkblue","lightgreen","green"]
  let starsELment3=document.querySelectorAll("#box-3 .fa-star");
  let emojiElemt3=document.querySelectorAll("#box-3 .fa-regular");
  let starsELment4=document.querySelectorAll("#box-4 .fa-star");
  let emojiElemt4=document.querySelectorAll("#box-4 .fa-regular");
  let starsELment5=document.querySelectorAll("#box-5 .fa-star");
  let emojiElemt5=document.querySelectorAll("#box-5 .fa-regular");
  let starsELment6=document.querySelectorAll("#box-6 .fa-star");
  let emojiElemt6=document.querySelectorAll("#box-6 .fa-regular");
  
  //loop to star element and add event listener to each one 
  starsELment2.forEach(
      (ele,index)=>{
         ele.addEventListener(
              "click",()=>{
                  upDateRating2(index)
              }
          )
      }
  );
  
  //function 
  
  function upDateRating2(index){
      starsELment2.forEach(
           (ele,idx)=>{
               if(idx<index+1){
        ele.classList.add("active");
               }else{ele.classList.remove("active")}
       
           }
        );
        emojiElemt2.forEach(
           (emoj)=>{
               emoj.style.transform=`translateY(-${index*36}px)`
               emoj.style.color=colorsArray[index];
           }
       );
       };
  
       //function for box3
  
       starsELment3.forEach(
          (ele,index)=>{
             ele.addEventListener(
                  "click",()=>{
                      upDateRating3(index)
                  }
              )
          }
      );
      
      
      function upDateRating3(index){
          starsELment3.forEach(
               (ele,idx)=>{
                   if(idx<index+1){
            ele.classList.add("active");
                   }else{ele.classList.remove("active")}
           
               }
            );
            emojiElemt3.forEach(
               (emoj)=>{
                   emoj.style.transform=`translateY(-${index*36}px)`
                   emoj.style.color=colorsArray[index];
               }
           );
           };
       
   //function box4
  
   starsELment4.forEach(
      (ele,index)=>{
         ele.addEventListener(
              "click",()=>{
                  upDateRating4(index)
              }
          )
      }
  );
  
  
  function upDateRating4(index){
      starsELment4.forEach(
           (ele,idx)=>{
               if(idx<index+1){
        ele.classList.add("active");
               }else{ele.classList.remove("active")}
       
           }
        );
        emojiElemt4.forEach(
           (emoj)=>{
               emoj.style.transform=`translateY(-${index*36}px)`
               emoj.style.color=colorsArray[index];
           }
       );
       };
   //function for box5
  
   starsELment5.forEach(
      (ele,index)=>{
         ele.addEventListener(
              "click",()=>{
                  upDateRating5(index)
              }
          )
      }
  );
  
  
  function upDateRating5(index){
      starsELment5.forEach(
           (ele,idx)=>{
               if(idx<index+1){
        ele.classList.add("active");
               }else{ele.classList.remove("active")}
       
           }
        );
        emojiElemt5.forEach(
           (emoj)=>{
               emoj.style.transform=`translateY(-${index*36}px)`
               emoj.style.color=colorsArray[index];
           }
       );
  
       };
  
     
  //function for box6
  
  starsELment6.forEach(
      (ele,index)=>{
         ele.addEventListener(
              "click",()=>{
                  upDateRating6(index)
              }
          )
      }
  );
  
  
  function upDateRating6(index){
      starsELment6.forEach(
           (ele,idx)=>{
               if(idx<index+1){
        ele.classList.add("active");
               }else{ele.classList.remove("active")}
       
           }
        );
        emojiElemt6.forEach(
           (emoj)=>{
               emoj.style.transform=`translateY(-${index*36}px)`
               emoj.style.color=colorsArray[index];
           }
       );
  
       };
  
  
  
  </script>
  @endPush 