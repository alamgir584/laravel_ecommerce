@extends('layouts.admin')

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Sub Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Sub Categories List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>SL.</th>
                              <th> Sub Category Name</th>
                              <th> Sub Category Slug</th>
                              <th> Category Name</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$row )


                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->subcategory_name}}</td>
                              <td>{{$row->subcategory_slug}}</td>
                              <td>{{$row->Category->category_name}}</td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                <a href="{{route('subcategory.delete',$row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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

  <!--  sub category insert Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModal">Add New Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('subcategory.store')}}" method="POST">
          @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="category_name">Category Name</label>

            <select class="form-control" name="category_id" required="">
              @foreach ($category as $row)
               <option value="{{$row->id}}">{{$row->category_name}}</option>
              @endforeach
            </select>

          </div>

            <div class="form-group">
              <label for="subcategory_name">Sub Category Name</label>
              <input type="text" class="form-control" name="subcategory_name" id="subcategory_name" required="">
              <small id="emailHelp" class="form-text text-muted">Your Sub Category</small>
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


    <!--  sub category Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('subcategory.update')}}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Sub Category Name</label>
              <input type="text" class="form-control" name="subcategory_name" id="edit_subcategory_name" required>
              <input type="hidden" class="form-control" id="edit_subcategory_id" name="id" >
              <small id="emailHelp" class="form-text text-muted">Your sub category</small>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script type="text/javascript">
  $('body').on('click','.edit',function(){
   let cat_id=$(this).data('id');
   $.get("subcategory/edit/"+cat_id,function(data){
           $('#edit_subcategory_name').val(data.subcategory_name);
           $('#edit_subcategory_id').val(data.id);
   });
  });
  </script>

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>

<script type="text/javascript">
  $('.dropify').dropify();
</script>

<script type="text/javascript">
	$('body').on('click','.edit', function(){
		let cat_id=$(this).data('id');
		$.get("category/edit/"+cat_id, function(data){
			 $("#modal_body").html(data);
		});
	});
</script> --}}

    @endsection

