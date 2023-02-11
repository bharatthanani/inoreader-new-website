<style>
    .reg-form {
        padding: 60px 0;
    }
       .reg-form  .sec-title {
           text-align: center;
           padding-bottom : 30px;
       }
       .reg-form  .sec-title h2 {
           font-size: 32px;
           font-weight : 700;
           color: #fff;
       }
        .reg-form .form-box {
            padding : 20px 15px;
            border: 1px solid #b71b21;
            border-radius : 10px;
            box-shadow: rgba(255 , 255 , 255 , 0.2) 0px 7px 29px 0px;
        }
          .reg-form .form-box .input-box {
              padding : 7px 0;
          }
               .reg-form .form-box .input-box .reg-feild {
                       background: transparent;
    padding: 8px 0 8px 15px;
    color: #fff;
    font-size: 15px;
    font-family: "Raleway", sans-serif;
               }
                .reg-form .form-box .input-box .reg-feild:focus {
                    border: 1px solid #ccc;
                }
                .sub-btn button {
                        background: #b71b21;
    border: 1px solid #b71b21;
    width: 100%;
    padding: 10px 0;
    margin: 5px 0 0 0;
    color: #fff;
    font-weight: 600;
    font-family: "Lato", sans-serif;
    border-radius: 5px;
                }
</style>

@extends('front/master')

@section('title')
Home
@endsection
@section('body_section')

<div class="container reg-form">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 col-xxl-5">
            <div class="sec-title">
                <h2>Register</h2>
            </div>
            <form action="{{route('register-process')}}" method="POST">
                @csrf
                <div class="form-box">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                            <div class="input-box">
                                <input type="text" name="name" class="form-control reg-feild" placeholder="Enter First Name" required>
                            </div>
                            @if($errors->has('name'))
                                    <div style="color:#b71b21;">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                            <div class="input-box">
                                <input type="text" name="last_name" class="form-control reg-feild" placeholder="Enter Last Name" required>
                            </div>
                            
                        </div>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                            <div class="input-box">
                                <input type="email" name ="email" class="form-control reg-feild" placeholder="Enter Email" required>
                            </div>
                             @if($errors->has('email'))
                                    <div style="color:#b71b21;">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                            <div class="input-box">
                                <input type="password" name="password" class="form-control reg-feild" placeholder="Enter Password" required>
                            </div>
                             @if($errors->has('password'))
                                    <div style="color:#b71b21;">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 ">
                            <div class="sub-btn">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
       
    </div>
</div>

@endsection

@section('script_section')
<script src="{{asset('assets/js/waitMe.js')}}"></script>

@endsection