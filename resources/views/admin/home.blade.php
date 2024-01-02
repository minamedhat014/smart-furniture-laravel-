@extends('admin.layouts.master')


@section('css')

@endsection

@section('contentHeader')
<h5 class="mb-2 mt-4">  </h5> 
@endsection

@section('content')
<div class="container-fluid">


 <div class="row">
  {{-- start box --}}

  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <a href="{{route('products.index')}}"  class="info-box-icon bg-light ">
      <span> <i class="fa-brands fa-product-hunt"></i></span>
       </a>
      <div class="info-box-content">
        <span class="info-box-text "> standing products</span>
        <span class="info-box-number">    {{App\Models\Product::where('status',2)->count()}}</span>
      </div> 
    </div>
  </div>

 {{-- start box --}}
  
 <div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <a  href="{{route('showroom.index')}}"  class="info-box-icon bg-light ">
    <span  > <i class="fa-solid fa-store"></i></span>
    </a>
      <div class="info-box-content">
        <span class="info-box-text "> show rooms </span>
        <span class="info-box-number">  {{App\Models\showroom::where('status',1)->count()}} </span>
    </div>
  </div>
</div>
  
 {{-- start box --}}
 <div class="col-md-3 col-sm-6 col-12">
  <div class="info-box">
    <a  href="{{route('showroom.index')}}"  class="info-box-icon bg-light ">
    <span><i class="fa-solid fa-user"></i></span>
   </a>
    <div class="info-box-content">
      <span class="info-box-text"> customers </span>
      <span class="info-box-number"> {{App\Models\customer::count()}} customer </span>
    </div>
  </div>


</div>
</div>

{{-- end row --}}

<div class="row">
  
 

</div>


</div>
@endsection