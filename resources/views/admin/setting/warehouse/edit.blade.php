
@extends('layouts.admin')
@section('admin_content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Warehouse Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Warehouse</h3>
              </div>

              <form role="form" action="{{route('update.warehouse',$data->id)}}" method="Post">

                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Warehouse Name</label>
                        <input type="text" class="form-control" name="warehouse_name"  value="{{$data->warehouse_name}}">
                      </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Warehouse Address</label>
                    <input type="text" class="form-control" name="warehouse_address" value="{{$data->warehouse_address}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword2">Warehouse Phone</label>
                    <input type="text" class="form-control" name="warehouse_phone"  value="{{$data->warehouse_phone}}">
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
