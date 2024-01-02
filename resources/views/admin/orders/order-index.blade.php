@extends('admin.layouts.master')

@section('title')
customer orders 
@endsection


@section('contentHeader')

@endsection

@section('content')
@livewire('admin.customers.customer-table')
@livewire('admin.orders.order-index')
@endsection
