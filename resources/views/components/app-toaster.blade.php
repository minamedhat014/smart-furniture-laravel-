<div class="row">
    @if (session()->has('success'))
     <div class="alert green alert-dismissible fade show col-sm-3" role="alert" id="toastAlert">
        <i class="fa-solid fa-check  fa-xl" style="color: #7cf164;"></i> {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         
         </button>
     </div>
     @endif
     
     @if (session()->has('error'))
     <div class="alert red alert-dismissible fade show col-sm-3" role="alert" id="toastAlert" style="max-height:45px;">
      <i class="fa-solid fa-circle-exclamation fa-beat" style="color: #fb2323;"></i>  {{ session()->get('error') }} 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </button>
     </div>
     @endif
</div>
<!-- End toast -->

