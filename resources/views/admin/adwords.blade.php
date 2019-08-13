@extends('admin.layouts.app')

@section('admin-content')
<div class="content">
  <div class="container-fluid">
    <div class="card strpied-tabled-with-hover">
      <div class="card-header ">
        <h4 class="card-title">Google Adwords Management</h4>
      </div>
      <div class="card-body col-lg-10 col-12">
        <div class="form-group">
          <label>Vertical Adwords - Skyscraper (160 x 600) </label>
          <textarea class="form-control" name="adwords_skyscraper" rows="5">{{ $adwords_skyscraper->value }}</textarea>
        </div>
        <div class="form-group">
            <label>Vertical Adwords - Square (200 x 200) </label>
            <textarea class="form-control" name="adwords_square" rows="5">{{ $adwords_square->value }}</textarea>
          </div>
        <div class="form-group">
          <button class="btn btn-primary" id="btn-save">Save</button>
        </div>
      </div>
    </div>
  </div>
</div>

@push('adminContentCss')
<style type="text/css">
</style>
@endpush
@push('adminContentJs')
<script type="text/javascript">
  $(document).ready( function () {
  });
  $(document).on('click', '#btn-save', function() {
    $.LoadingOverlay("show");
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/adwords',
      data: { 
        adwords_skyscraper: $('textarea[name=adwords_skyscraper]').val(), 
        adwords_square: $('textarea[name=adwords_square]').val()
      },
      success: function(data) {
        // console.log('res-success: ', data);
        $.LoadingOverlay("hide");
        toastr.success(data.message);
      },
      error: function(err) {
        $.LoadingOverlay("hide");
        console.log('err: ', err);
      }
    });
  });
</script>
@endpush
@endsection