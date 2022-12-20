@extends('layouts.admin')
@section('admin_content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Coupon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{route('create.coupon')}}" class="btn btn-primary">+Add New</a>

            </ol>
          </div>
        </div>
    </div>

        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Coupon List</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Coupon Code</th>
                                <th>Coupon Amount</th>
                                <th>Coupon Date</th>
                                <th>Coupon Status</th>
                                <th>Coupon Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                        @foreach ($coupon as $key=>$row )

                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->coupon_code}}</td>
                              <td>{{$row->coupon_amount}}</td>
                              <td>{{$row->valid_date}}</td>
                              <td>{{$row->status}}</td>
                              <td>{{$row->type}}</td>
                              <td>
                                <a href="{{route('edit.coupon',$row->id)}}" class="btn btn-info btn-sm " ><i class="fas fa-edit"></i></a>
                                <a href="{{route('coupon.delete',$row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>


                              </td>
                            </tr>
                            @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
@endsection

