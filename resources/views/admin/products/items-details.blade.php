@extends('admin.layouts.master')

@section('title')
products
@endsection
@section('css')

 
@endsection

@section('contentHeader')
@endsection

@section('content')
@livewire('admin.products.product-details',['productID'=>$id,'type'=>$type])
@livewire('admin.products.product-details-modal',['productID'=>$id,'type'=>$type])

@endsection


@section('script')

@endsection