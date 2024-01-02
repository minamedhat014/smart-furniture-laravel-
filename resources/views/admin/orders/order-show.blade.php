@extends('admin.layouts.master')

@section('title')
customer orders 
@endsection


@section('contentHeader')

@endsection

@section('content')
@livewire('admin.orders.show-orders')
@endsection
