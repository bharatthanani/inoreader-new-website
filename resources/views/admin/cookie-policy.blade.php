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
            <h1 class="m-0">Cookie Policy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Cookie Policy</li>
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
              <form id="quickForm1" action="{{route('addPolicy')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$policy->id??null}}">
                <input type="hidden" name="type"  value="cookie">
                
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Cookie Policy</label>
                  <textarea placeholder="Enter Text" id="summernote" name="text" class="form-control">{{$policy->text??null}}</textarea>
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