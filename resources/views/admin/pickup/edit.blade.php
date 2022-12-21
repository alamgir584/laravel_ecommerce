
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
              <li class="breadcrumb-item active">Pickup Point Edit</li>
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
                <h3 class="card-title">Edit Pickup Point</h3>
              </div>

              <form role="form" action="{{route('update.pickup-point',$data->id)}}" method="Post">

                @csrf
                <div class="card-body">

                <div class="form-group">
                    <label for="pickup_point_name">Pickup Point Name</label>
                    <input type="text" class="form-control" name="pickup_point_name" value="{{ $data->pickup_point_name }}">
                </div>


                <div class="form-group">
                    <label for="pickup_point_address">Pickup Point Address</label>
                    <input type="text" class="form-control"  name="pickup_point_address" value="{{ $data->pickup_point_address }}">
                </div>


                <div class="form-group">
                    <label for="pickup_point_phone">Pickup Point Phone</label>
                    <input type="text" class="form-control"  name="pickup_point_phone" value="{{ $data->pickup_point_phone }}">
                </div>


                <div class="form-group">
                    <label for="pickup_point_phone_two">Pickup Point Phone Two</label>
                    <input type="text" class="form-control"  name="pickup_point_phone_two" value="{{ $data->pickup_point_phone_two }}">
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
