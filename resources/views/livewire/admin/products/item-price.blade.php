<div>
    <x-appToaster/>
      <div>
          <div  wire:ignore.self class="modal fade" id="itemPriceAddModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header"> 
                  <p class="modal-title fs-5" id="itemPriceAddModel">  update Item Price</p>
                </div>
        
                <div class="modal-body">
                         <form  wire:submit="store" autocomplete="off"  >
                            @csrf 
  
                          <div class="row justify-content-center col-12 ">
  
                            <div class="feild col-4">
                              <label for="dealler_price"> Dealler Price</label>
                              <i class="fa-solid fa-money-bill-wave"></i> 
                              <input type="text" class="feild-input"  placeholder="Dealler price" required   wire:model.lazy="dealler_price">
                              @error('dealler_price') <span class="feild span" >{{ $message }}</span> @enderror
                           </div>
         
  
                           <div class="feild col-4">
                            <label for="name"> Dealler Margin </label>
                            <i class="fa-solid fa-percent"></i>
                            <input type="text" class="feild-input"  placeholder="Margin" required   wire:model.lazy="dealler_margin">
                            @error('dealler_margin') <span class="feild span" >{{ $message }}</span> @enderror
                         </div>
  
                           <div class="feild col-4">
                            <label for="name"> Enduser price before Discount </label>
                            <i class="fa-solid fa-money-bill-wave"></i> 
                            <input type="text" class="feild-input"  placeholder=" Enduser price before Discount " required   wire:model.lazy="end_before_discount">
                            @error('end_before_discount') <span class="feild span" >{{ $message }}</span> @enderror
                         </div>
                   </div>
                   <div class="row justify-content-start col-12 ">
                       <div class="feild col-4">
                          <label for="name"> Special discount</label>
                          <i class="fa-solid fa-percent"></i>
                          <input type="text" class="feild-input"  placeholder="Special discount" wire:model.lazy="special_discount_entered">
                          @error('special_discount_entered') <span class="feild span" >{{ $message }}</span> @enderror
                       </div>
  
  
                       <div class="feild col-4">
                          <label for="name"> Enduser price </label>
                          <i class="fa-solid fa-tag"></i>
                          <input type="text" class="feild-input"  placeholder="Special discount" wire:model.lazy="end_after_discount">
                          @error('end_after_discount') <span class="feild span" >{{ $message }}</span> @enderror
                       </div>
                     
              </div>                                      
                </div>
              
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-outline-success"  > save </button>
                </div>
            </form>
              </div>
            </div>
          </div>
      </div>
        
   {{-- edit --}}
  
   
  </div>
  