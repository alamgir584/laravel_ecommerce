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
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Password Change</h3>
            </div>

            <form action="{{route('admin.password.update')}}" method="POST">
              @csrf
            <div class="card-body">

            <div class="form-group">
            <label for="exampleInputPassword1">Current Password</label>
            <input type="password" name="old_password" class="form-control" id="exampleInputPassword1" placeholder="Current Password">

            <div class="form-group">
              <label for="exampleInputPassword2"> New Password</label>
              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" placeholder="New Password">
              @error('password')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="exampleInputPassword3"> Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword3" placeholder="Confirm Password">
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
