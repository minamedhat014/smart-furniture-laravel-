@extends('admin.layouts.master')

@section('title')
products
@endsection
@section('css')

@endsection

@section('contentHeader')
<div class="container mt-4">

@endsection

@section('content')

@livewire('admin.products.products')
@livewire('admin.products.product-details-modal')
@livewire('admin.products.product-document')

@endsection


@section('script')

     
@endsection