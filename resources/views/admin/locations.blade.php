@extends('admin.layouts.app')

@section('admin-content')
<div class="content">
  <div class="container-fluid">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
          <h4 class="card-title">Locations Management</h4>
      </div>
      <div class="row px-3">
        <div class="card-body table-full-width table-responsive m-0 col-md-6 col-12">
          <div class="form-group">
            <label>Location Name</label>
            <input type="text" class="form-control" name="location_name" maxlength="30">
          </div>
          <div class="form-group">
            <button class="btn btn-primary" id="btn-add-location">Add</button>
          </div>
        </div>
        <div class="card-body table-full-width table-responsive m-0 col-md-6 col-12">
          {{-- <table class="table table-hover table-striped border-0" id="locations-table">
            <thead>
              <th class="border-0">ID</th>
              <th class="border-0">Location Name</th>
            </thead>
            <tbody>
              @foreach($locations as $index => $location)
              <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->location_name }}</td>
              </tr>
              @endforeach
            </tbody>
          </table> --}}
          <div class="table">
            <div class="table-head">
              <li class="list-item">
                <div class="location-id">ID</div>
                <div class="location-name">Location Name</div>
              </li>
            </div>
            <ul class="table-body">
              @foreach ($locations as $location)
              <li class="list-item">
                <div class="location-id">{{ $location->id }}</div>
                <div class="location-name">{{ $location->location_name }}</div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('adminContentCss')
<style type="text/css">
  /* .dataTables_length {
    padding: 15px;
  }
  table select, .dataTables_length select {
    border: none;
    font-size: 17px;
    outline: none;
  }
  .dataTables_filter label {
    padding: 15px;
  }
  .dataTables_filter label input {
    border: solid 1px #dcdcdc;
    font-size: 17px;
  }
  .dataTables_info {
    padding: 15px
  }
  table {
    overflow-x: auto;
    display: block;
  }
  th {
    min-width: 80px;
  }
  th:first-child {
    min-width: 20px;
  }
  td.dataTables_empty {
    display: table-cell !important;
  } */
  .table-head {
    font-weight: bold;
  }
  .table-body {
    list-style: none;
    padding: 0px;
    max-height: 568px;
    overflow: auto;
  }
  .list-item {
    display: inline-block;
    padding: 10px;
    width: 300px;
    border-bottom: solid 1px #eee;
    cursor: pointer;
  }
  .table-body .list-item:nth-child(odd) {
    background-color: #eee;
  }
  .location-id {
    display: inline-flex;
    width: 50px;
  }
  .location-name {
    display: inline-flex;
  }
</style>
@endpush
@push('adminContentJs')
<script type="text/javascript">
  $(document).ready( function () {
    // $('#locations-table').DataTable();
  });
  $(document).on('click', '#btn-add-location', function() {
    $.LoadingOverlay("show");
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/locations',
      data: { location_name: $('input[name=location_name]').val() },
      success: function(data) {
        // console.log('res-success: ', data);
        $.LoadingOverlay("hide");
        toastr.success(data.message);
        window.location.reload();
      },
      error: function(err) {
        $.LoadingOverlay("hide");
        console.log('err: ', err);
        if(err.responseJSON.location_name.length) {
          for(var i = 0; i < err.responseJSON.location_name.length; i++) {
            toastr.error(err.responseJSON.location_name[i]);
          }
        }
      }
    });
  });
</script>
@endpush
@endsection