@extends('admin.layouts.master')

@section('title')
product items
@endsection
@section('css')

 
@endsection

@section('contentHeader')
@endsection

@section('content')
@livewire('admin.products.product-details',['product_id'=>$id,'type_id'=>$type])
@endsection


@section('script')

@endsection