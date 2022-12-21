
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
              <li class="breadcrumb-item active">Pickup Point Create</li>
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
                <h3 class="card-title">Create a new Pickup Point</h3>
              </div>

              <form role="form" action="{{route('store.pickup-point')}}" method="Post">

                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="pickup_point_name">Pickup Point Name</label>
                    <input type="text" class="form-control"  name="pickup_point_name" required="" placeholder="Pickup Point Name">
                  </div>

                  <div class="form-group">
                    <label for="pickup_point_address">Pickup Point Address</label>
                    <input type="text" class="form-control"  name="pickup_point_address" required="" placeholder="Pickup Point Address">
                  </div>

                  <div class="form-group">
                    <label for="pickup_point_phone">Pickup Point Phone</label>
                    <input type="text" class="form-control"  name="pickup_point_phone" required="" placeholder="Pickup Point Phone">
                  </div>

                  <div class="form-group">
                    <label for="pickup_point_phone_two">Pickup Point Phone Two</label>
                    <input type="text" class="form-control"  name="pickup_point_phone_two" required="" placeholder="Pickup Point Phone Two">
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
