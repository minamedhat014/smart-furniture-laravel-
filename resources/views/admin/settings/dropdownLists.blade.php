@extends('admin.layouts.master')

@section('title')
dropdown lists
@endsection
@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
 
@endsection

@section('contentHeader')
 
@endsection

@section('content')

@livewire('admin.settings.drop-lists')
@endsection

