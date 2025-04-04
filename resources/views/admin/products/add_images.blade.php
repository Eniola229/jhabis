@extends('layouts.admin_layout.admin_layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if($errors->any())
        <div class="alert alert-danger" style="margin-top: 10px;">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissable fade show" role="alert" style="margin-top:10px;">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissable fade show" role="alert" style="margin-top:10px;">
                {{ Session::get('error_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
          <form name="addImageForm" id="addImageForm" method="POST"  action="{{ url('admin/add-images/'.$productdata->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{ $productdata->id }}">
            <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                  
                    <div class="form-group">
                        <label for="product_name">Product Name: </label> &nbsp; {{ $productdata->product_name }}
                        
                    </div>

                    <div class="form-group">
                        <label for="product_code">Product Code: </label> &nbsp; {{ $productdata->product_code }}
                    </div>

                    <div class="form-group">
                        <label for="product_color">Product Color: </label> &nbsp; {{ $productdata->product_color }}
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <img style="width:120px; margin-top: 5px;" src="{{ $productdata->image_url}}" alt="">
                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="field_wrapper">
                            <div>
                                <input multiple="" id="images" name="images[]" type="file" name="images[]" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

               
            </div>
            <!-- /.card-body -->
            {{-- <div class="card-footer"> --}}
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Add Images</button>
                </div>
            {{-- </div> --}}
            </div>
          </form> 
          <form name="editImageForm" id="editImageForm" method="POST"  action="{{ url('admin/edit-images/'.$productdata->id) }}">
            @csrf
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Added Product Images</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="products" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productdata['images'] as $image)
                    <input style="display:none;" type="text" name="attrId[]" value="{{ $image->id }}">
                        <tr> 
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img style="width:120px" src="{{ $image->image_url }}" alt=""></td>
                            <td>
                                {{-- @if($image['status'] ==1)
                                    <a class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)"> Active </a>
                                @else 
                                    <a class="updateImageStatus" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)"> Inactive </a>
                                @endif --}}
                                
                                @if($image->status == 'ACTIVE')
                                    <a class="updateImageStatus btn btn-success btn-sm" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)" data-status="ACTIVE">
                                        ACTIVE
                                    </a>
                                @else 
                                    <a class="updateImageStatus btn btn-info btn-sm" id="image-{{ $image->id }}" image_id="{{ $image->id }}" href="javascript:void(0)" data-status="INACTIVE">
                                        INACTIVE
                                    </a>
                                @endif
                                &nbsp; &nbsp;
                                <a title="Delete Image" href="javascript:void(0)" class="confirmDelete button btn btn-danger btn-sm"  record="image" recordid="{{ $image->id }}" type="button">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
          </form>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection