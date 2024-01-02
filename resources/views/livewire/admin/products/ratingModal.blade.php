<div  wire:ignore.self class="modal fade" id="EditpriceRate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
       
        <div class="modal-header"> 
          <p class="modal-title fs-5" id="Model"> update with new rating </p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <form wire:submit="update" autocomplete="off" >
            @csrf
            <button type="submit" hidden> </button>
            <div class="row ">
      
             {{-- price rating  --}}
      
             <div class="survey-box col-sm-5 ml-5 mb-5" id="box-2">
                                <h5> Rate product price </h5>
                               
                              <div class="emoje-box">
                                   <i class="fa-regular fa-angry emoje"></i>
                                   <i class="fa-regular fa-meh emoje"></i>
                                   <i class="fa-regular fa-smile emoje"></i>
                                   <i class="fa-regular fa-face-grin-stars emoje"></i>
                                   <i class="fa-regular fa-face-grin-hearts emoje"></i>
                             </div>
                        
                                 <div class="survey-rate">
                                 <input  hidden type="radio" id="reviewprice1"  value="1"  wire:model.live="price_scale" />
                                 <label for="reviewprice1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                           
                                 <input hidden type="radio" id="reviewprice2"  value="2"  wire:model.live="price_scale"/>
                                 <label for="reviewprice2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                        
                                 <input hidden type="radio" id="reviewprice3"  value="3"  wire:model.live="price_scale"/>
                                 <label for="reviewprice3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                        
                                 <input hidden type="radio" id="reviewprice4"  value="4"  wire:model.live="price_scale"/>
                                 <label for="reviewprice4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                        
                                 <input hidden type="radio" id="reviewprice5"  value="5"  wire:model.live="price_scale"/>
                                 <label for="reviewprice5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                                 </div>
                             
                                <input type="text" class="rate-input" placeholder=" Add comment" wire:model.live="price_recomendation" >
                                @error('price_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
                                </div>
          
          
                                {{-- material rate  --}} 
          
                                <div class="survey-box col-sm-5 ml-5 mb-5 " id="box-3">
                                  <h5> Rate product materials  {{$material_scale}}</h5>
                                  
                                <div class="emoje-box">
                                  <i class="fa-regular fa-angry emoje"></i>
                                  <i class="fa-regular fa-meh emoje"></i>
                                  <i class="fa-regular fa-smile emoje"></i>
                                  <i class="fa-regular fa-face-grin-stars emoje"></i>
                                  <i class="fa-regular fa-face-grin-hearts emoje"></i>
                               </div>
                          
                                   <div class="survey-rate">
                                   <input  hidden type="radio" id="reviewmaterial1"  value="1"  wire:model.live="material_scale" />
                                   <label for="reviewmaterial1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                             
                                   <input hidden type="radio" id="reviewmaterial2"  value="2"  wire:model.live="material_scale"/>
                                   <label for="reviewmaterial2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
                          
                                   <input hidden type="radio" id="reviewmaterial3"  value="3"  wire:model.live="material_scale"/>
                                   <label for="reviewmaterial3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                          
                                   <input hidden type="radio" id="reviewmaterial4"  value="4"  wire:model.live="material_scale"/>
                                   <label for="reviewmaterial4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
                          
                                   <input hidden type="radio" id="reviewmaterial5"  value="5"  wire:model.live="material_scale"/>
                                   <label for="reviewmaterial5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                                   </div>
                               
                                  <input type="text" class="rate-input" placeholder=" Add comment" wire:model.live="material_recomendation" >
                                  @error('material_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
                                  </div>
            
          
             {{-- colors rate  --}} 
            
             <div class="survey-box col-sm-5 ml-5 mb-5 " id="box-4">
              <h5> Rate product color </h5>
             
            <div class="emoje-box">
              <i class="fa-regular fa-angry emoje"></i>
              <i class="fa-regular fa-meh emoje"></i>
              <i class="fa-regular fa-smile emoje"></i>
              <i class="fa-regular fa-face-grin-stars emoje"></i>
              <i class="fa-regular fa-face-grin-hearts emoje"></i>
           </div>
          
               <div class="survey-rate">
               <input  hidden type="radio" id="reviewcolor1"  value="1"  wire:model.live="colors_scale" />
               <label for="reviewcolor1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
          
               <input hidden type="radio" id="reviewcolor2"  value="2"  wire:model.live="colors_scale"/>
               <label for="reviewcolor2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
          
               <input hidden type="radio" id="reviewcolor3"  value="3"  wire:model.live="colors_scale"/>
               <label for="reviewcolor3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
          
               <input hidden type="radio" id="reviewcolor4"  value="4"  wire:model.live="colors_scale"/>
               <label for="reviewcolor4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
          
               <input hidden type="radio" id="reviewcolor5"  value="5"  wire:model.live="colors_scale"/>
               <label for="reviewcolor5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
               </div>
           
              <input type="text" class="rate-input" placeholder=" Add comment" wire:model.live="colors_recomendation" >
              @error('colors_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
              </div>
      
      
            {{-- design rate  --}}
      
              <div class="survey-box col-sm-5 ml-5 mb-5" id="box-5">
                <h5> Rate product design </h5>
               
              <div class="emoje-box">
                <i class="fa-regular fa-angry emoje"></i>
                <i class="fa-regular fa-meh emoje"></i>
                <i class="fa-regular fa-smile emoje"></i>
                <i class="fa-regular fa-face-grin-stars emoje"></i>
                <i class="fa-regular fa-face-grin-hearts emoje"></i>
             </div>
            
                 <div class="survey-rate">
                 <input  hidden type="radio" id="reviewdesign1"  value="1"  wire:model.live="design_scale" />
                 <label for="reviewdesign1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewdesign2"  value="2"  wire:model.live="design_scale"/>
                 <label for="reviewdesign2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewdesign3"  value="3"  wire:model.live="design_scale"/>
                 <label for="reviewdesign3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewdesign4"  value="4"  wire:model.live="design_scale"/>
                 <label for="reviewdesign4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewdesign5"  value="5"  wire:model.live="design_scale"/>
                 <label for="reviewdesign5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                 </div>
             
                <input type="text" class="rate-input" placeholder=" Add comment" wire:model.live="design_recomendation" >
                @error('design_recomendation') <span class="feild span" >{{ $message }}</span> @enderror                   
                </div>
          
                   
            {{-- general rate  --}}
      
              <div class="survey-box col-sm-5 ml-5 mb-5" id="box-6">
                <h5> Rate this product in general </h5>
               
              <div class="emoje-box">
                <i class="fa-regular fa-angry emoje"></i>
                <i class="fa-regular fa-meh emoje"></i>
                <i class="fa-regular fa-smile emoje"></i>
                <i class="fa-regular fa-face-grin-stars emoje"></i>
                <i class="fa-regular fa-face-grin-hearts emoje"></i>
             </div>
            
                 <div class="survey-rate">
                 <input  hidden type="radio" id="reviewgeneral1"  value="1"  wire:model.live="general_scale" />
                 <label for="reviewgeneral1"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewgeneral2"  value="2"  wire:model.live="general_scale"/>
                 <label for="reviewgeneral2"><i class="fas fa-star  fa-2x rate-star " id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewgeneral3"  value="3"  wire:model.live="general_scale"/>
                 <label for="reviewgeneral3"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewgeneral4"  value="4"  wire:model.live="general_scale"/>
                 <label for="reviewgeneral4"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>
            
                 <input hidden type="radio" id="reviewgeneral5"  value="5"  wire:model.live="general_scale"/>
                 <label for="reviewgeneral5"><i class="fas fa-star  fa-2x rate-star" id="reviewStars1"></i></label>    
                 </div>
                <button class="rate-input bg-success" type="submit" data-bs-dismiss="modal"> submit </button>
                </div>
        
      
            </div>   
          </form>
    </div>  
      </div>
    </div>
</div>



<!--  delete Modal -->
<div  wire:ignore.self class="modal fade" id="deleteRatingModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
        <p class="modal-title fs-5" id="deleteModel"> Delete product review </p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
      <div class="modal-body">
               <form wire:submit="delete" autocomplete="off">
                  @csrf

                 <p class="text-danger"> are you sure you want to delete this record ? </p>
                                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-outline-success" data-bs-dismiss="modal">Yes</button>
      </div>
  </form>
    </div>
  </div>
</div>

