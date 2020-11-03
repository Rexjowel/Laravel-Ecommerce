@extends('admin.admin-master')
@section('product') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_content')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Admin</a>
      
      <span class="breadcrumb-item active">Manage Product</span>
    </nav>

    <div class="sl-pagebody">
      <div class="row row-sm">



        <div class="col-md-12">
          
  
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Product List</h6>
            
           


            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-15p">Image</th>
                    <th class="wd-15p">Product Name</th>
                    <th class="wd-15p">Product Quantity</th>
                    <th class="wd-15p">Category</th>

                    <th class="wd-20p">Status</th>
                    <th class="wd-25p">Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($products as $product)
                      
                  <tr>
                    <td>
                        <img src="{{ asset($product->image_one) }}" width="50px" height="50px" alt="">
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>{{ $product->category->category_name}}</td>


                    <td>
                      @if($product->status == 1)
                      <span class="badge badge-success">Active</span>
                      @else
                      <span class="badge badge-danger">Inactive</span>

                      @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/products/edit/'.$product->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                        <a href="{{ url('admin/products/delete/'.$product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
  
                        @if($product->status == 1)
  
                        <a href="{{ url('admin/products/inactive/'.$product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                        @else
                        <a href="{{ url('admin/products/active/'.$product->id) }}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></a>
                        @endif
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>

       

      </div>
       


</div>
@endsection