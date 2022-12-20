
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
              <li class="breadcrumb-item active">Coupon Create</li>
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
                <h3 class="card-title">Create a new Coupon</h3>
              </div>

              <form role="form" action="{{route('store.coupon')}}" method="Post">

                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="coupon_code">Coupon Code </label>
                    <input type="text" class="form-control"  name="coupon_code" required="" placeholder="Coupon Code">
                  </div>

                  <div class="form-group">
                    <label for="coupon_amount">Coupon Amount </label>
                    <input type="text" class="form-control"  name="coupon_amount" required="" placeholder="Coupon Amount">
                  </div>


                  <div class="form-group">
                    <label for="valid_date">Valid Date</label>
                    <input type="date" class="form-control"  name="valid_date" required="">
                  </div>

                  <div class="form-group">
                    <label for="coupon_code">Coupon Status </label>
                    <select class="form-control" name="status" required>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                  </div>


                <div class="form-group">
                    <label for="coupon_code">Coupon Type </label>
                    <select class="form-control" name="type" required>
                        <option value="Fixed">Fixed</option>
                        <option value="Percentage">Percentage</option>
                    </select>
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
