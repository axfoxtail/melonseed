@extends('admin.layouts.app')

@section('admin-content')
<div class="content">
  <div class="container-fluid">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
          <h4 class="card-title">Users Management</h4>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped border-0" id="users-table">
          <thead>
            <th class="border-0">ID</th>
            <th class="border-0">permission</th>
            <th class="border-0">username</th>
            <th class="border-0">first name</th>
            <th class="border-0">last name</th>
            <th class="border-0">email</th>
            <th class="border-0">email verified at</th>
            <th class="border-0">phone number</th>
            <th class="border-0">role</th>
            <th class="border-0">avatar</th>
          </thead>
          <tbody>
            @foreach($users as $index => $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>
                <select class="user-permission" {{ $user->role == "admin" ? "disabled" : "" }} data-id="{{ $user->id }}">
                  <option value="0" {{ $user->permission == "0" ? "selected" : "" }}>Pendding</option>
                  <option value="1" {{ $user->permission == "1" ? "selected" : "" }}>Active</option>
                  <option value="2" {{ $user->permission == "2" ? "selected" : "" }}>Block</option>
                </select>
              </td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->first_name }}</td>
              <td>{{ $user->last_name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->email_verified_at }}</td>
              <td>{{ $user->phone_number }}</td>
              <td>{{ $user->role }}</td>
              <td><img class="avatar-img" src="{{ asset($user->avatar) }}"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@push('adminContentCss')
<style type="text/css">
  .dataTables_length {
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
  .avatar-img {
    width: 30px;
  }
  td.dataTables_empty {
    display: table-cell !important;
  }
</style>
@endpush
@push('adminContentJs')
<script type="text/javascript">
  $(document).ready( function () {
    $('#users-table').DataTable();
  });

  $(document).on('change', '.user-permission', function() {
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/users/permission',
      data: {
        user_id: $(this).data('id'),
        permission: $(this).val(),
      },
      success: function(data) {
        console.log('res-success: ', data);
        toastr.success(data.message);
      },
      error: function(err) {
        console.log('err: ', err);
      }
    });
  })
</script>
@endpush
@endsection