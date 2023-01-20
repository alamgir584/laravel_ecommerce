@extends('layouts.admin')

@section('admin_content')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css"> --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Campaign</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+Add New</button>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Campaign List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Start Date</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Discount(%)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->brand_name }}</td>
                                                <td>{{ $row->brand_slug }}</td>
                                                <td><img src="{{ asset('public/files/brand/' . $row->brand_logo) }}"
                                                        width="120" height="30"></td>
                                                <td>
                                            <a id="brand_modal_open" href="#" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $row->id }}" data-toggle="modal"
                                                        data-target="#editModal"><i class="fas fa-edit"></i></a>
                                           <a href="{{ route('brand.delete', $row->id) }}"
                                            class="btn btn-danger btn-sm" id="delete"><i
                                            class="fas fa-trash"></i></a>
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

    <!--  Campaign insert Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            {{-- modal-lg ar mane add new button a click korle boro kore asbe --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModal">Add New Campaign</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{ route('brand.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Campaign Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" required="">
                            <small id="emailHelp" class="form-text text-muted">This is your campaign title</small>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="end_date">End Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="discount">Discount(%)<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="discount" id="discount" required="">
                                    <small id="emailHelp" class="form-text text-danger ">Discount parcentage are apply for all product selling price</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" id="image" required>
                            <small id="emailHelp" class="form-text text-muted">This is our campaign banner </small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--  category Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{ route('brand.update') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="edit_brand_name" required>
                            <br>
                            <input type="hidden" class="form-control" id="brand_id" name="id" >
                            <small id="emailHelp" class="form-text text-muted">Your Main Brand</small>
                        </div>

                        <div class="form-group">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" class="form-control" name="brand_logo" id="edit_brand_logo" required>
                            <input type="hidden"  id="old_brand_logo" name="old_brand_logo">
                            <small id="emailHelp" class="form-text text-muted">Your Main Brand Logo</small>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">
            $('body').on('click', '#brand_modal_open', function() {
                let cat_id = $(this).data('id');
                $.get("brand/edit/" + cat_id, function(data) {
                    console.log(data.id);
                    $('#edit_brand_name').val(data.brand_name);
                    $('#old_brand_logo').val(data.brand_logo);
                    $('#brand_id').val(data.id);
                });
            });
        </script>
@endsection

