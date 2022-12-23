@extends('layouts.admin')
@section('admin_content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript" src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Child Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+Add New</button>
            </ol>
          </div>
        </div>
      </div>
    </div>


        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">All Child Categories List</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>SL.</th>
                              <th> Child Category Name</th>
                              <th> Child Category Slug</th>
                              <th> Category Name</th>
                              <th> Sub Category Name</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=>$row )


                            <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->childcategory_name}}</td>
                              <td>{{$row->childcategory_slug}}</td>
                              <td>{{$row->Category->category_name}}</td>
                              <td>{{$row->Subcategory->subcategory_name}}</td>
                              <td>
                                <a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>
                                <a href="{{route('childcategory.delete',$row->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
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
          <h5 class="modal-title" id="categoryModal">Add New Child Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('childcategory.store')}}" method="POST">
          @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="category_name">Category Name</label>
            <select class="form-control" name="category_id" id="category_id" required="">
              @foreach ($category as $row)
               <option value="{{$row->id}}">{{$row->category_name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="category_name">Sub Category Name</label>
            <select class="form-control" name="subcategory_id" id="subcategory_id" required="">
              @foreach ($subcategory as $row)
               <option value="{{$row->id}}">{{$row->subcategory_name}}</option>
              @endforeach
            </select>
          </div>

            <div class="form-group">
              <label for="childcategory_name">Child Category Name</label>
              <input type="text" class="form-control" name="childcategory_name" id="childcategory_name" required="">
              <small id="emailHelp" class="form-text text-muted">Your Child Category</small>
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


    <!--  child category Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Child Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <form action="{{route('childcategory.update')}}" method="POST">
          @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Child Category Name</label>
              <input type="text" class="form-control" name="childcategory_name" id="edit_childcategory_name" required>
              <input type="hidden" class="form-control" id="edit_childcategory_id" name="id" >
              <small id="emailHelp" class="form-text text-muted">Your Child category</small>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
  <script src="{{ asset('public/backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

  <script type="text/javascript">
  $('body').on('click','.edit',function(){
   let cat_id=$(this).data('id');
   $.get("childcategory/edit/"+cat_id,function(data){
           $('#edit_childcategory_name').val(data.childcategory_name);
           $('#edit_childcategory_id').val(data.id);
   });
  });

     //ajax request send for collect childcategory mane holo category select korle categoryr under a joto sub categore ache se gulo asbe sob subcategory asbe na
     $("#category_id").change(function(){
      var id = $(this).val();
      $.ajax({
           url: "{{ url("/get-sub-category/") }}/"+id,
           type: 'get',
           success: function(data) {
                $('select[name="subcategory_id"]').empty();
                   $.each(data, function(key,data){
                      $('select[name="subcategory_id"]').append('<option value="'+ data.id +'">'+ data.subcategory_name +'</option>');
                });
           }
        });
     });
  </script>
   @endsection
