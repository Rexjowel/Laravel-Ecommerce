@extends('admin.admin-master')
@section('coupon')
    active
@endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      
      <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">




        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">Update Coupon
                </div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endif

                    <form action="{{ route('update.coupon') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $coupon->id }}">
                        <div class="form-group">
                          <label for="exampleInputEmail1"> Coupon Name</label>
                          <input type="text" name="coupon_name" value="{{ $coupon->coupon_name }}" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">

                          @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                      </form>




                </div>
            </div>
        </div>

      </div>
       


</div>
@endsection