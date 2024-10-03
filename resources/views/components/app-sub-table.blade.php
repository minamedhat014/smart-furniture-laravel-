@props(['name'])

<div>
    <x-appToaster/> 
      <div>
          <div class="continer">
            
              <div wire:loading class="loading" >
              <i class="fa-solid fa-spinner fa-spin "></i> 
           processing.... please wait 
            </div>
           
              <div class="row">
                 <div class="col-md-12">
                  <div class="card">
                    <div class="badge bg-light p-1" >
                      {{$name}}
                    </div>
      
                      <div class="card-body bg-light table-responsive" >
                          <table id="example1" class="table-light table-hover table-sm table-bordered text-center " style="width: -webkit-fill-available;">
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
  

