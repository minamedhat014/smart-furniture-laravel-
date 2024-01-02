@extends('admin.layouts.master')

@section('title')
order details
@endsection


@section('contentHeader')

@endsection

@section('content')
@livewire('admin.orders.customer-order-details',['order_id'=>$id ])
@endsection
