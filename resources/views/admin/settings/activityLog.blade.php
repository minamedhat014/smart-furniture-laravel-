@extends('admin.layouts.master')

@section('title')
activity log
@endsection
@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
 
@endsection

@section('contentHeader')
 
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> list of activity logs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table-light table-hover table-sm table-bordered" >
            <thead class="custom-table-header">
            <tr>
               <th class="col-1"> Uder ID </th>
                <th class="col-1"> description</th>
                <th class="col-2"> Model </th>
                <th class="col-2"> changes </th>
                <th class="col-1"> created at</th>
            </tr>
            </thead>
            <tbody>
                @foreach($activity as $row)
                <tr>
                  <td>{{$row->causer_id}}</td>
                  <td>{{$row->description}}</td>
                  <td>{{$row->subject_type}}</td>
                  <td>{{$row->changes}}</td>
                  <td>{{$row->created_at}}</td>
        
                  </tr>
                  @endforeach
           
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

@endsection


@section('script')


<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

@endsection