
@extends('admin/layout/layout')

@section('header-script')
 
 <style type="text/css">
    /* .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
      background-color: #007bff;
      border-color: #006fe6;
      color: #fff;
    } */
  </style>
@endsection

@section('navbar-section')

@endsection

@section('sider-section')
@endsection

@section('body-section')
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
             <?php $profile = Auth()->user()->profile; ?>
             <?php $email   = Auth()->user()->email; ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                
                        @if(Auth()->user()->profile)
                        <img class="profile-user-img img-fluid img-circle"
                        src='{{asset("documents/profile/$profile")}}'
                        alt="User profile picture">
                        @else

                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('dist/img/user4-128x128.jpg"
                        alt="User profile picture')}}"
                        alt="User profile picture">

                        @endif
                  
                </div>

                <h3 class="profile-username text-center">{{Auth()->user()->first_name}} {{Auth()->user()->last_name}}</h3>

                <p class="text-muted text-center">Admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth()->user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right">{{Auth()->user()->phone_number}}</a>
                  </li>
                  
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active"  href="#settings" data-toggle="tab"> profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="POST" action="{{url('update-profile-process')}}" enctype= multipart/form-data>
                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                     @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="first_name" class="form-control" id="inputName" placeholder="First Name" value="{{Auth()->user()->first_name}}" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Last Name" value="{{Auth()->user()->last_name}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth()->user()->email}}" readonly>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="text" name="phone_number" class="form-control" id="inputPhone" placeholder="Phone number" value="{{Auth()->user()->phone_number}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <p style="float:center"><img  id="output" width="200" /></p>
                      </div>

                       <!-- <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile</label>
                        <div class="col-sm-10">
                          <input type="file" name="profile" class="form-control" id="inputprofile"onchange="loadFile(event)" >
                        </div>
                      </div> -->
                      
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div> -->
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('footer-section')
@endsection

@section('footer-script')

<!-- CodeMirror -->


<script>




var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};


</script>

@endsection