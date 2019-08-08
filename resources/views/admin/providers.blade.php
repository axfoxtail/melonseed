@extends('admin.layouts.app')

@section('admin-content')
<div class="content">
  <div class="container-fluid">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
          <h4 class="card-title">Providers Management</h4>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped border-0" id="providers-table">
          <thead>
            <th class="border-0">ID</th>
            <th class="border-0">business name</th>
            <th class="border-0">permission</th>
            <th class="border-0">banner image</th>
            <th class="border-0">thumbnail image</th>
            <th class="border-0">profile image</th>
            <th class="border-0">category</th>
            <th class="border-0">activity type</th>
            <th class="border-0">activity description</th>
            <th class="border-0">age range</th>
            <th class="border-0">business hours</th>
            <th class="border-0">address</th>
            {{-- <th class="border-0">state</th> --}}
            {{-- <th class="border-0">city</th> --}}
            {{-- <th class="border-0">zip code</th> --}}
            <th class="border-0">contact info</th>
            <th class="border-0">website</th>
            <th class="border-0">social media links</th>
            <th class="border-0">owner</th>
            <th class="border-0">slug</th>
          </thead>
          <tbody>
            @foreach($providers as $index => $provider)
            <tr>
              <td>
                {{ $provider->id }}
                <div class="hover-btn-wrapper">
                  <a href="{{ url('/admin/providers/profile') . '/' . $provider->id }}"><i class="fa fa-pencil"></i></a>
                </div>
              </td>
              <td>{{ $provider->business_name }}</td>
              <td>
                <select class="provider-permission" data-id="{{ $provider->id }}">
                  <option value="0" {{ $provider->permission == "0" ? "selected" : "" }}>Pendding</option>
                  <option value="1" {{ $provider->permission == "1" ? "selected" : "" }}>Active</option>
                  <option value="2" {{ $provider->permission == "2" ? "selected" : "" }}>Block</option>
                </select>
              </td>
              <td><img class="banner-img" src="{{ asset($provider->banner_img) }}"></td>
              <td><img class="thumbnail-img" src="{{ asset($provider->thumbnail_img) }}"></td>
              <td><img class="profile-img" src="{{ asset($provider->profile_img) }}"></td>
              <td>{{ $provider->categories->category_name }}</td>
              <td>{{ $provider->activityTypes->activity_type_name }}</td>
              <td>{{ $provider->activity_description }}</td>
              <td>{{ displayAgeRange($provider->age_range) }}</td>
              <td>{{ displayBusinessHoursPattern($provider->business_hours) }}</td>
              <td>{{ $provider->address }}</td>
              {{-- <td>{{ $provider->state }}</td> --}}
              {{-- <td>{{ $provider->city }}</td> --}}
              {{-- <td>{{ $provider->zip_code }}</td> --}}
              <td>{{ $provider->phone_number }}</td>
              <td>{{ $provider->website }}</td>
              <td>{{ $provider->social_media_links }}</td>
              <td>{{ $provider->users->username }}</td>
              <td>{{ $provider->slug }}</td>
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
  th, td {
    min-width: 80px;
    width: auto;
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
  .profile-img {
    width: 150px;
    height: 150px;
  }
  .thumbnail-img {
    width: 90px;
    height: 45px;
  }
  .banner-img {
    width: 200px;
    height: 100px;
  }
  .hover-btn-wrapper {
    position: absolute;
    left: 50%;
    display: none;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: #fff;
    font-size: 22px;
    -webkit-box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0); 
    box-shadow: 0px 10px 13px -7px #000000, 5px 5px 15px 5px rgba(0,0,0,0);
    margin-top: -30px;
  }
  .hover-btn-wrapper a {
    padding: 8px;
  }
  tr:hover .hover-btn-wrapper {
    display: block;
    opacity: 0.5;
  }
  tr:hover .hover-btn-wrapper:hover {
    opacity: 1;
  }
</style>
@endpush
@push('adminContentJs')
<script type="text/javascript">
  $(document).ready( function () {
    $('#providers-table').DataTable();
  });

  $(document).on('change', '.provider-permission', function() {
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/providers/permission',
      data: {
        provider_id: $(this).data('id'),
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