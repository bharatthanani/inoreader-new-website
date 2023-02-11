
@extends('admin/layout/layout')

@section('header-script')

@endsection

@section('body-section')

<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                  <div class="text-center">
                     <img class="profile-user-img img-fluid img-circle"
                        src="../../dist/img/user4-128x128.jpg"
                        alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center">{{$users->first_name??''}} {{$users->last_name??''}}</h3>
                  <p class="text-muted text-center">{{$users->type??''}}</p>
                  <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{$users->email??''}}</a>
                     </li>
                     <li class="list-group-item">
                        <b>Phone</b> <a class="float-right">{{$users->phone_number??''}}</a>
                     </li>
                     <li class="list-group-item">
                        <b>Total Order</b> <a class="float-right">{{$user_detail->order_count??''}}</a>
                     </li>
                  </ul>
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- About Me Box -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">About Me</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> State</strong>
                  <p class="text-muted">{{$users->state??''}}</p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> City</strong>
                  <p class="text-muted">{{$users->city??''}}</p>
                  <hr>
                  <strong><i class="fas fa-book mr-1"></i> Address</strong>
                  <p class="text-muted">
                     {{$users->address??''}}
                  </p>
                  <hr>
                  <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                  <p class="text-muted">{{$users->note??''}}</p>
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
                     <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  </ul>
               </div>
               <!-- /.card-header -->
               @if(is_object($user_detail))
               @forelse($user_detail['order']  as $key => $item)
               <div class="card-body">
                  <div class="tab-content">
                     <div class="active timeline timeline-inverse">
                        <!-- timeline time label -->
                        <div class="time-label">
                           <span class="bg-success">
                             {{$item->created_at}}
                           </span>
                           
                           <span class="bg-danger">
                             ${{$item->grand_total}}
                           </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                           <div class="timeline-item">
                              
                              <h3 class="timeline-header">
                             
                                 <table class="table">
                                     <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Dimensions</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                         @if(isset($user_detail['order'][$key]['products']))
                                            @forelse($user_detail['order'][$key]['products'] as $product)
                                                <tr>
                                                    <td>{{ $product->name}}</td>
                                                    <td>${{ $product->price}}</td>
                                                    <td>{{ $product->L}}x{{$product->W}}x{{$product->H??''}}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                         @endif
                                     </tbody>
                                     
                                 </table>
                              
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @empty
               @endforelse
               @else
               <h3 class='text-center'>No data found</h3>
               @endif
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content -->
  
@endsection


@section('footer-section')

@endsection

@section('footer-script')


<script>


</script>

<script type="text/javascript">
 

</script>

@endsection