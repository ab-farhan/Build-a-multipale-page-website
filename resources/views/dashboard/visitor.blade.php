@extends('layouts.admin_master')
@section('title','Visitor Information')

@section('content')
<div class="container-fluid">
    <div class="row card">
      <div class="card-header">
        <h3 class="d-inline-block mt-2">All Visitor Information</h3> 
      </div>
    <div class="col-md-12 card-body">
        <table id="VisitorDt" class="table table-striped table-sm table-bordered  card-body" cellspacing="0" width="100%">
          <thead class="bg-danger text-white">
            <tr>
              <th class="th-sm">NO</th>
              <th class="th-sm">IP</th>
              <th class="th-sm">Date & Time</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($visitorData as $data)
              <tr>
                  <th class="th-sm">{{$data->id}}</th>
                  <th class="th-sm">{{$data->ip_address}}</th>
                  <th class="th-sm">{{$data->created_at->format('d-F-Y | h:i:s A')}}</th>
                </tr>
              @endforeach
            
            
          </tbody>
        </table>
      
    </div>
    </div>
</div>
@endsection

@section('script')
<script>
      // visitor page dataTable
$(document).ready(function () {
    $('#VisitorDt').DataTable({
        "order": false,
    });
    $('.dataTables_length').addClass('bs-select');
});


</script>
@endsection