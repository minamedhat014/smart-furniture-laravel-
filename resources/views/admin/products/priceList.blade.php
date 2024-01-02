@extends('admin.layouts.master')

@section('title')
product prices 
@endsection
@section('css')

 
@endsection

@section('contentHeader')
@endsection

@section('content')
@livewire('admin.products.item-price',['product_detail_id'=>$id])


@endsection

@section('script')

@endsection