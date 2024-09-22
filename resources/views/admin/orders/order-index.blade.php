@extends('admin.layouts.master')

@section('title')
orders 
@endsection


@section('contentHeader')

@endsection

@section('content')
@livewire('admin.orders.customer-orders',['customer_id'=>$id ])
@livewire('admin.orders.customer-order-details')
@endsection
