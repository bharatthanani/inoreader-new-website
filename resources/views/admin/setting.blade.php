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
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
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
              <form id="quickForm1" action="{{route('addSettings')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$settings->id??null}}">
                <div class="form-group">
                    @php 
                    $logo = $settings->logo??null; 
                    $footer_logo = $settings->footer_logo??null; 
                    @endphp
                    <p><img  src='{{asset("documents/setting/$logo")}}' id="output" width="200" /></p>
                  </div>
                  
                <div class="form-group">
                  <label for="exampleInputEmail1">Header Logo</label>
                  <input type="file" name="logo" onchange="loadFile(event)"  class="form-control" id="profile" >
                </div>


                <div class="form-group">
                    <p><img  src='{{asset("documents/setting/$footer_logo")}}' id="output" width="200" /></p>
                  </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Footer Logo</label>
                  <input type="file" name="footer_logo" onchange="loadFile(event)"  class="form-control" id="profile" >
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Url</label>
                    <input type="url" name="facebook" class="form-control" id="facebook" value="{{$settings->facebook??null}}" placeholder="Enter Facebook Url">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Url</label>
                    <input type="url" name="twitter" class="form-control" id="twitter" value="{{$settings->twitter??null}}" placeholder="Enter Twitter Url">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Pinterst Url</label>
                    <input type="url" name="pinterst" class="form-control" id="pinterst" value="{{$settings->pinterst??null}}" placeholder="Enter Pinterst Url">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Url</label>
                    <input type="url" name="instagram" class="form-control" id="instagram" value="{{$settings->instagram??null}}" placeholder="Enter Instagram Url">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Youtube Url</label>
                    <input type="url" name="youtube" class="form-control" id="youtube" value="{{$settings->youtube??null}}" placeholder="Enter Youtube Url">
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

@endsection