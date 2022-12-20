
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
              <li class="breadcrumb-item active">Coupon Edit</li>
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
                <h3 class="card-title">Edit Coupon</h3>
              </div>

              <form role="form" action="{{route('update.coupon',$data->id)}}" method="Post">

                @csrf
                <div class="card-body">

                 <div class="form-group">
                    <label for="coupon_code">Coupon Code </label>
                    <input type="text" class="form-control" name="coupon_code" value="{{ $data->coupon_code }}"  >

                  </div>


                  <div class="form-group">
                    <label for="coupon_amount"> Coupon Amount </label>
                    <input type="text" class="form-control"  name="coupon_amount" value="{{ $data->coupon_amount }}">
                 </div>


                 <div class="form-group">
                    <label for="valid_date">Valid Date</label>
                    <input type="date" class="form-control"  name="valid_date" required="" value="{{ $data->valid_date }}">
                  </div>


                   <div class="form-group">
                    <label for="coupon_code">Coupon Status </label>
                    <select class="form-control" name="status" required>
                      <option value="Active" @if($data->type=="Active") selected @endif>Active</option>
                      <option value="Inactive" @if($data->type=="Inactive") selected @endif>Inactive</option>
                    </select>
                  </div>


                <div class="form-group">
                    <label for="coupon_code">Coupon Type </label>
                    <select class="form-control" name="type" required>
                        <option value="Fixed" @if($data->type=="Fixed") selected @endif >Fixed</option>
                        <option value="Percentage" @if($data->type=="Percentage") selected @endif>Percentage</option>
                    </select>
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
