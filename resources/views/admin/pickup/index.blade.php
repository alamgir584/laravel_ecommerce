@extends('layouts.admin')
@section('admin_content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Pickup Point</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{route('create.pickup-point')}}" class="btn btn-primary">+Add New</a>

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
                      <h3 class="card-title">All Pickup Point List</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Pickup Point Name</th>
                                <th>Pickup Point Address</th>
                                <th>Pickup Point Phone</th>
                                <th>Pickup Point Phone Two</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                        @foreach ($pickup as $key=>$row )

                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->pickup_point_name}}</td>
                              <td>{{$row->pickup_point_address}}</td>
                              <td>{{$row->pickup_point_phone}}</td>
                              <td>{{$row->pickup_point_phone_two}}</td>
                              <td>
                                <a href="{{route('edit.pickup-point',$row->id)}}" class="btn btn-info btn-sm " ><i class="fas fa-edit"></i></a>
                                <a href="{{route('pickup-point.delete',$row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>


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

