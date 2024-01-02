@props(['name'])

<div>
    <x-appToaster/> 
      <div>
          <div class="continer">
            
              <div wire:loading class="loading" >
              <i class="fa-solid fa-spinner fa-spin "></i> 
           processing....
            </div>
           
              <div class="row">
                 <div class="col-md-12">
                  <div class="card">
                    <div class="badge bg-light p-1" >
                      {{$name}}
                    </div>
                      <div class="card-header table-actions">
                               <div class="row ">
                                <x-table-pages/>
                                <x-table-sort/>
                                {{$header}}
                                <x-table-search/>
                             
                           
                              </div>
                      </div>
                      <div class="card-body bg-light">
                          <table id="example1" class="table-light table-hover table-sm table-bordered" >
                              <thead class="custom-table-header" >
                     
                              {{$head}}
                            
                            
                              </thead>
                              <tbody class="custom-table-body" >
                              
                                  {{$body}}
                           
                              </tbody>
                                <tfoot>
  
                                    {{$footer}}
                                    
                                </tfoot>
                              </table>
                      </div>
                  </div>
                </div>
              </div>
          </div>
      </div>      
  </div>
  


  <div   wire:ignore.self class="modal fade" id="Download" tabindex="-1" aria-labelledby="Download" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> Data Filter </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
    
     
     
           <div class="col-10">
            <span  class="col-3"> <i class="fa-solid fa-filter"></i> Start </span>
            <input type="date" class="feild-input"   placeholder=" Strat Date" wire:model="startDate">
           </div>
          
           <div class="col-10">
            <span  class="col-3"> <i class="fa-solid fa-filter"></i> End </span>
            <input type="date" class="feild-input" placeholder=" End Date" wire:model="endDate">
           </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" 
              
          wire:click="export" > Download </button>
        </div>
      </div>
    </div>
  </div>