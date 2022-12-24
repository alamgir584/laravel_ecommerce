@extends('layouts.admin')
@section('admin_content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a href="{{route('product.create')}}" class="btn btn-primary">+Add New</a>

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
                      <h3 class="card-title">All Product List</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>SL.</th>
                              <th>Name</th>
                              <th>Code</th>
                              <th>Category</th>
                              <th>Subcategory</th>
                              <th>Thumbnail</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                        @foreach ($product as $key=>$row )

                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->code}}</td>
                              <td>{{$row->Category->category_name}}</td>
                              <td>{{$row->Subcategory->subcategory_name}}</td>
                              <td><img src="{{ asset('public/files/product/' . $row->thumbnail) }}"
                                width="120" height="120"></td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm " ><i class="fas fa-edit"></i></a>
                                {{-- {{route('edit.warehouse',$row->id)}} --}}
                                <a href="#" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                                {{-- {{route('delete.warehouse',$row->id)}} --}}

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

