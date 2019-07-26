@extends('admin.layouts.app')

@section('admin-content')
<div class="content">
  <div class="container-fluid">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
          <h4 class="card-title">Reviews Management</h4>
      </div>
      <div class="card-body table-full-width table-responsive">
        <table class="table table-hover table-striped border-0" id="reviews-table">
          <thead>
            <th class="border-0">ID</th>
            <th class="border-0">permission</th>
            <th class="border-0">provider</th>
            <th class="border-0">provider banner</th>
            <th class="border-0">provider thumbnail</th>
            <th class="border-0">provider detail</th>
            <th class="border-0">content</th>
            <th class="border-0">rate</th>
            <th class="border-0">rated by</th>
            <th class="border-0"></th>
            <th class="border-0">created at</th>
          </thead>
          <tbody>
            @foreach($reviews as $index => $review)
            <tr>
              <td>{{ $review->id }}</td>
              <td>
                <select class="review-permission" data-id="{{ $review->id }}">
                  <option value="0" {{ $review->permission == "0" ? "selected" : "" }}>Pendding</option>
                  <option value="1" {{ $review->permission == "1" ? "selected" : "" }}>Active</option>
                  <option value="2" {{ $review->permission == "2" ? "selected" : "" }}>Block</option>
                </select>
              </td>
              <td>{{ $review->providers->business_name }}</td>
              <td>
                <img class="banner-img" src="{{ $review->providers->thumbnail_img ? $review->providers->thumbnail_img : '' }}">
              </td>
              <td>
                <img class="thumbnail-img" src="{{ $review->providers->thumbnail_img ? $review->providers->thumbnail_img : '' }}">
              </td>
              <td>
                <img class="detail-img" src="{{ $review->providers->thumbnail_img ? $review->providers->thumbnail_img : '' }}">
              </td>
              <td>{{ $review->content }}</td>
              <td>
                <div class="read-rating" data-rating="{{ $review->rate }}"></div>
              </td>
              <td>{{ ($review->users->first_name && $review->users->last_name) ? ($review->users->first_name . ' ' . $review->users->last_name) : $review->users->username }}</td>
              <td>
                <img class="avatar-img" src="{{ $review->users->avatar ? $review->users->avatar : '' }}">
              </td>
              <td>{{ $review->created_at }}</td>
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
  .banner-img {
    width: 200px;
    height: 100px;
  }
  .thumbnail-img {
    width: 90px;
    height: 45px;
  }
  .detail-img {
    width: 100px;
    height: 100px;
  }
  .avatar-img {
    width: 80px;
  }
  .read-rating {
    width: 110px;
  }
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/star-rating-svg/src/css/star-rating-svg.css') }}">
@endpush
@push('adminContentJs')
<script src="{{ asset('plugins/star-rating-svg/src/jquery.star-rating-svg.js') }}"></script>
<script type="text/javascript">
  $(".read-rating").starRating({
    starSize: 20,
    readOnly: true,
    hoverColor: '#38cbb7',
    activeColor: '#38cbb7',
    useGradient: false,
    callback: function(currentRating, $el){
        // make a server call here
    }
  });

  $(document).ready( function () {
    $('#reviews-table').DataTable();
  });

  $(document).on('change', '.review-permission', function() {
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/reviews/permission',
      data: {
        review_id: $(this).data('id'),
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