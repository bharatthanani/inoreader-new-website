@extends('admin/layout/layout')

@section('header-script')
<style type="text/css">
  
</style>
@endsection

@section('navbar-section')

@endsection

@section('sider-section')
@endsection

@section('body-section')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About Us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">About Us</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
        <div class="modal-body">
              <form id="quickForm1" action="{{route('AddAboutUs')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$data->id??null}}">
                <input type="hidden" name="type"  value="policy">
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" class="form-control"  value="{{$data->title??null}}">
                </div>
                
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Message</label>
                  <textarea placeholder="Enter Text" id="summernote" name="text" class="form-control">{{$data->text??null}}</textarea>
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" name="image" >
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          
        </div>
       
        
      </div>
    </section>
@endsection


@section('footer-section')
@endsection

@section('footer-script')
<script>
     $('#summernote').summernote()
</script>
@endsection