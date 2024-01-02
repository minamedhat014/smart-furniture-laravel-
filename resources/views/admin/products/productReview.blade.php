@extends('admin.layouts.master')

@section('title')
Product Review 
@endsection
@section('css')

@endsection

@section('contentHeader')

@endsection

@section('content')

@livewire('admin.products.product-review',['product_id'=>$id])
@endsection


@section('script')

     
@endsection