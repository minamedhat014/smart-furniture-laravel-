@extends('admin.layouts.master')

@section('title')
Order show
@endsection


@section('contentHeader')

@endsection

@section('content')
@livewire('admin.orders.customer-orders',['customer_id'=>$id ])
@endsection
