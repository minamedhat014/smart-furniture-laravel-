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



    <form wire:submit.prevent="store" autocomplete="off" >
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
                           <input  hidden type="radio" id="reviewprice1"  value="1"  wire:model.defer="price_scale" />
                           <label for="reviewprice1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                     
                           <input hidden type="radio" id="reviewprice2"  value="2"  wire:model.defer="price_scale"/>
                           <label for="reviewprice2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice3"  value="3"  wire:model.defer="price_scale"/>
                           <label for="reviewprice3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice4"  value="4"  wire:model.defer="price_scale"/>
                           <label for="reviewprice4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                  
                           <input hidden type="radio" id="reviewprice5"  value="5"  wire:model.defer="price_scale"/>
                           <label for="reviewprice5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                           </div>
                       
                          <input type="text" class="rate-input" placeholder=" Add comment" wire:model.defer="price_recomendation" >
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
                             <input  hidden type="radio" id="reviewmaterial1"  value="1"  wire:model.defer="material_scale" />
                             <label for="reviewmaterial1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                       
                             <input hidden type="radio" id="reviewmaterial2"  value="2"  wire:model.defer="material_scale"/>
                             <label for="reviewmaterial2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial3"  value="3"  wire:model.defer="material_scale"/>
                             <label for="reviewmaterial3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial4"  value="4"  wire:model.defer="material_scale"/>
                             <label for="reviewmaterial4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                    
                             <input hidden type="radio" id="reviewmaterial5"  value="5"  wire:model.defer="material_scale"/>
                             <label for="reviewmaterial5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                             </div>
                         
                            <input type="text" class="rate-input" placeholder=" Add comment" wire:model.defer="material_recomendation" >
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
         <input  hidden type="radio" id="reviewcolor1"  value="1"  wire:model.defer="colors_scale" />
         <label for="reviewcolor1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor2"  value="2"  wire:model.defer="colors_scale"/>
         <label for="reviewcolor2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor3"  value="3"  wire:model.defer="colors_scale"/>
         <label for="reviewcolor3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor4"  value="4"  wire:model.defer="colors_scale"/>
         <label for="reviewcolor4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
    
         <input hidden type="radio" id="reviewcolor5"  value="5"  wire:model.defer="colors_scale"/>
         <label for="reviewcolor5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
         </div>
     
        <input type="text" class="rate-input" placeholder=" Add comment" wire:model.defer="colors_recomendation" >
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
           <input  hidden type="radio" id="reviewdesign1"  value="1"  wire:model.defer="design_scale" />
           <label for="reviewdesign1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign2"  value="2"  wire:model.defer="design_scale"/>
           <label for="reviewdesign2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign3"  value="3"  wire:model.defer="design_scale"/>
           <label for="reviewdesign3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign4"  value="4"  wire:model.defer="design_scale"/>
           <label for="reviewdesign4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewdesign5"  value="5"  wire:model.defer="design_scale"/>
           <label for="reviewdesign5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
           </div>
       
          <input type="text" class="rate-input" placeholder=" Add comment" wire:model.defer="design_recomendation" >
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
           <input  hidden type="radio" id="reviewgeneral1"  value="1"  wire:model.defer="general_scale" />
           <label for="reviewgeneral1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral2"  value="2"  wire:model.defer="general_scale"/>
           <label for="reviewgeneral2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral3"  value="3"  wire:model.defer="general_scale"/>
           <label for="reviewgeneral3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral4"  value="4"  wire:model.defer="general_scale"/>
           <label for="reviewgeneral4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
      
           <input hidden type="radio" id="reviewgeneral5"  value="5"  wire:model.defer="general_scale"/>
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




