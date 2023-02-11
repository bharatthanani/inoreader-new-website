@extends('admin/layout/layout')
@section('header-script') 

<style>
   .dataTables_wrapper .dataTables_processing {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    /* height:     100%; */
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
   }
</style>
@endsection
@section('body-section')
<br>
<section class="content">
<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <!-- <a href="#!" class="btn btn-primary" id="AddUserText" data-toggle="modal"  data-target="#modal-default">Add User</a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                       
                     </tr>

                  </thead>
                  <tbody>
                     @forelse($data as $key => $item)
                       <tr>
                         <td>{{$key+1}}</td>
                         <td>{{$item->name}}</td>
                         <td>{{$item->email}}</td>
                         <td>{{$item->profile}}</td>
                       </tr>
                     @empty
                     @endforelse
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
      </div>
   </div>
</div>
<div class="modal fade myModel" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title userTitle">Add User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="quickForm" action="" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label for="exampleInputEmail1">First name</label>
                  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter Name">
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Last name</label>
                  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Name">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" id="email" class="form-control" >
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Phone Number</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control" >
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea  name="address" id="address" class="form-control" ></textarea>
               </div>
               <div class="form-group">
                  <p><img  id="output" width="200" /></p>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Profile</label>
                  <input type="file" name="profile" onchange="loadFile(event)"  class="form-control" id="profile" >
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-note">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Add Note</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="quickForm1" action="" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label for="">Note</label>
                  <textarea name="note" id="note" class="form-control" rows="10"></textarea>
               </div>
               <div class="card-footer">
                  <button type="button" class="update_note btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('footer-section')
@endsection
@section('footer-script')
<script src="{{asset('assets/js/waitMe.js')}}"></script>
<script>
  var APP_URL = {!! json_encode(url('/')) !!}
  
   $(function () {
   
   $('#quickForm').validate({
     rules: {
      
       first_name: {
        required: true,
       },

       last_name: {
        required: true,
       },
       
     },
     messages: {
       // terms: "Please accept our terms"
     },
     errorElement: 'span',
     errorPlacement: function (error, element) {
       error.addClass('invalid-feedback');
       element.closest('.form-group').append(error);
     },
     highlight: function (element, errorClass, validClass) {
       $(element).addClass('is-invalid');
     },
     unhighlight: function (element, errorClass, validClass) {
       $(element).removeClass('is-invalid');
     }
   });
   });
   
   
   
   var loadFile = function(event) {
   var image = document.getElementById('output');
   image.src = URL.createObjectURL(event.target.files[0]);
   };
   
</script>
<script type="text/javascript">
   var csrf_token = $('meta[name="csrf-token"]').attr('content');
   $(function () {
   
     var table = $('.yajra-datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('get-users') }}",
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'name', name: 'name'},
             {data: 'email', name: 'email'},
             { data: 'profile', name: 'profile',
                     render: function( data, type, full, meta ) {
                       return "<img src=\"http://localhost/SZ_john/public/documents/profile/" + data + "\" height=\"50\"/>";
                     }
             },
   
            {
                 data: 'action', 
                 name: 'action', 
                 orderable: true, 
                 searchable: true
             },
         ]
     });
     
   });
   
   
            jQuery(document).delegate('a.delete-record', 'click', function(e) {
                 e.preventDefault();
                 var id = jQuery(this).attr('data-id');
                
                $("#deleteUser"+id).text('process');  
                 
                 var didConfirm = confirm("Are you sure You want to delete");
                 if (didConfirm == true) {
                
                 $("#deleteUser"+id).text('process'); 
                       $.ajax({
                       type: 'GET', 
                       url : "{{url('delete-user')}}", 
                       data:{ id: id},
                       success : function (data) {
                           console.log(data);
                         if(data)
                         {
                           toastr.success(data.message);
                           var oTable = $('.yajra-datatable').dataTable();
                             oTable.fnDraw(false);
                         }else{
                           toastr.error(data.message);
                         } 
                         } 
                     });
                 return true;
             } 
     });
   
   $(document).on("click","#AddUserText",function(event) {
        document.getElementById("quickForm").reset();
        $("#output").attr("src","");
        
     })
   $(document).on("click",".update_user",function(event) {
   
     event.stopPropagation();
     event.stopImmediatePropagation();
     full_page()
     var id = $(this).attr("data-id");
     if(id)
       {
         $(".userTitle").text('Update User');
       }else{
         $(".userTitle").text('Add User');
       }
    
     $.ajax({
         type: 'GEt', 
         url : "{{url('getUsers')}}", 
         data:{ id: id},
         success : function (data) {
              $("#id").val(data.id);
              $("#first_name").val(data.first_name);
              $("#last_name").val(data.last_name);
              $("#email").val(data.email);
              $("#phone_number").val(data.phone_number);
              $("#address").val(data.address);
              $("#output").val(data.profile);
              $("#output").attr("src","http://localhost/TestProject/public/documents/profile/"+data.profile);
             $('#container').waitMe("hide")
         }
     })
   });
   
   $('#quickForm').submit(function(e) {
   e.preventDefault();
   var formData = new FormData(this);
   
   full_page()
     $.ajax({
       type:'POST',
       url: "{{ url('addUpdateUser')}}",
       data: formData,
       cache:false,
       contentType: false,
       processData: false,
       success: (data) => {
        //  $(".myModel").modal('hide');
         $('#container').waitMe("hide")
         var oTable = $('.yajra-datatable').dataTable();
         oTable.fnDraw(false);
         $("#btn-save").html('Submit');
         $("#btn-save"). attr("disabled", false);
         document.getElementById('quickForm').reset();
         console.log(data);
         },
         error: function(data){
         console.log(data);
         }
     });
   });
   
   
    
   $.extend( $.fn.dataTable.defaults, {
         language: {
             "processing": "Loading. Please wait..."
         },
     
     });
</script>
@endsection