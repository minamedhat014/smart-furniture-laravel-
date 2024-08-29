@extends('admin.layouts.master')

@section('title')
customers details 
@endsection


@section('contentHeader')

@endsection
@section('content')


    @livewire('admin.customers.customer-index',['showList' => False])



<div class="row mt-4">
    <nav class="w-100">
      <div class="nav nav-tabs" id="customer-tab" role="tablist">
        <a class="nav-item nav-link active" id="customer-order-tab" data-toggle="tab" href="#customer-order" role="tab" aria-controls="customer-order" aria-selected="true"> <i class="fa-solid fa-cart-arrow-down"></i> Orders</a>
        <a class="nav-item nav-link" id="customer-activity-tab" data-toggle="tab" href="#customer-activity" role="tab" aria-controls="customer-activity" aria-selected="false"> <i class="fa-solid fa-person-circle-exclamation"></i> Activites</a>
        <a class="nav-item nav-link" id="customer-complaint-tab" data-toggle="tab" href="#customer-complaint" role="tab" aria-controls="customer-complaint" aria-selected="false"> <i class="fa-solid fa-screwdriver-wrench"></i> Complaints</a>
      </div>
    </nav>
    <div class="tab-content p-3" id="nav-tabContent">
      <div class="tab-pane fade show active" id="customer-order" role="tabpanel" aria-labelledby="customer-order-tab"> 
        @livewire('admin.orders.order-index')
      </div>
      <div class="tab-pane fade" id="customer-activity" role="tabpanel" aria-labelledby="customer-activity-tab">
      
       غفغفغفغفغفغف 

      </div>
      <div class="tab-pane fade" id="customer-complaint" role="tabpanel" aria-labelledby="customer-complaint-tab">
       فغفغفغف
       </div>
    </div>
  </div>

@endsection

