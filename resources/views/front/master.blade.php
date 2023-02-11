<!DOCTYPE html>
<html>

<head>
    <title> @yield('title') </title>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.css.map')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.min.css.map')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="images/fav-icon.png" type="image/png" sizes="">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/t-scroll.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}" />
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">
    <link href="{{asset('assets/css/calendar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/waitMe.css')}}" />
    <link rel="icon" href="{{asset('assets/images/fav-icon.png')}}" type="image/png" sizes="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Tag Manager -->
<script>
// (function (w, d, s, l, i) {
//         w[l] = w[l] || []; w[l].push({
//             'gtm.start':
//                 new Date().getTime(), event: 'gtm.js'
//         }); var f = d.getElementsByTagName(s)[0],
//             j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
//                 'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
//     })(window, document, 'script', 'dataLayer', 'GTM-569VK5W');
   
    </script>
<!-- End Google Tag Manager -->
</head>

<body id="container">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M67VG3T"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <header class="main-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                @php $settings =  App\Models\Setting::first(); @endphp 
                    <a class="navbar-brand" href="{{route('index')}}"><img class="logo-main img-fluid"
                    src='{{asset("documents/setting/$settings->logo")}}' alt=""></a>
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle=""
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <form action="{{route('search-feed')}}" method="GET">
                             @csrf    
                            <div class="input-group mic-drop">
                                <input type="text" class="form-control" name="search" placeholder="Seacrch" aria-label="Search"
                                    aria-describedby="basic-addon2" required>
                                <button class="input-group-text" type="submit" id="basic-addon2"><i
                                        class="fa-light fa-magnifying-glass"></i></button>
                            </div>
                            </form>


                        </ul>
                        <form class="d-flex">
                            <a class="header-bell-btn" type="bell"><i class="fa-light fa-bell"></i></a>
                            <a href="{{route('user-register')}}" class="header-account-btn" type="submit"><span class="user-icon"><i
                                        class="fa-light fa-user"></i></span> Register</a>
                            @if(Auth::check())            
                             <a href="{{route('user-logout')}}" class="header-account-btn" type="submit">
                                 <span class="user-icon">
                                 <i class="fa-regular fa-arrow-right-to-bracket"></i>
                                 </span> Logout</a>
                            @else
                            <a href="{{route('user-login')}}" class="header-account-btn" type="submit">
                                 <span class="user-icon">
                                 <i class="fa-regular fa-arrow-right-to-bracket"></i>
                                 </span> Login</a>
                            @endif
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- header selector start -->
    <header class="header-slector">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container">
                    <h6 class="nav-link" href="#">My Feed:</h6>
                    <button class="navbar-toggler" type="button" data-bs-toggle="" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav" style="overflow-x:hidded;">
                    @if($data_limit != 1)


                     
                           
                            <!--@if(isset($myCategories))-->
                            <!-- @foreach($myCategories as $key => $item)-->
                            <!-- @php $url = $feed[$key]; @endphp-->
                            <!-- <li class="nav-item">-->
                          
                            <!--     <li class="nav-item dropdown my-link ">-->
                            <!--      <a class="nav-link dropdown-toggle nav_link" href="#" data-key = "{{$key}}" data-id = "{{$item}}" id="title{{$item}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--       {{$item}}-->
                            <!--      </a>-->
                            <!--      <ul class="dropdown-menu" id="{{$key}}" aria-labelledby="title{{$item}}">-->
                                   
                                    
                            <!--      </ul>-->
                            <!--    </li>-->
                            <!--</li>-->
                            <!-- @endforeach-->
                            <!--@endif-->
                            
                            @if(isset($categories))
                                 <ul class="navbar-nav" style="flex-wrap: wrap;">
                                 @foreach($categories as $item)
                                    <li class="nav-item">
                                      
                                         <li class="nav-item dropdown my-link">
                                          <a class="nav-link dropdown-toggle" href="#"  data-id = "{{$item->category_name}}" id="title{{$item->category_name}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           {{$item->category_name}}
                                          </a>
                                        
                                            @if(isset($item->subcategory))
                                              <ul class="dropdown-menu" id="{{$item->category_name}}" aria-labelledby="title{{$item->category_name}}">
                                                 @foreach($item->subcategory as $val)
                                                  <li><a class="nav-link my-link"  href="{{route('myfeed',$val->feed)}}">{{$val->title}}</a></li>
                                                 @endforeach
                                              </ul>
                                           @endif
                                        </li>
                                    </li>
                                 @endforeach    
                                </ul>
                             @endif
                        
                        @else
                              @if(isset($categories))
                                 <ul class="navbar-nav" style="flex-wrap: wrap;">
                                 @foreach($categories as $item)
                                    <li class="nav-item">
                                      
                                         <li class="nav-item dropdown my-link">
                                          <a class="nav-link dropdown-toggle" href="#"  data-id = "{{$item->category_name}}" id="title{{$item->category_name}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           {{$item->category_name}}
                                          </a>
                                        
                                            @if(isset($item->subcategory))
                                              <ul class="dropdown-menu" id="{{$item->category_name}}" aria-labelledby="title{{$item->category_name}}">
                                                 @foreach($item->subcategory as $val)
                                                  <li><a class="nav-link my-link"  href="{{route('myfeed',$val->feed)}}">{{$val->title}}</a></li>
                                                 @endforeach
                                              </ul>
                                           @endif
                                        </li>
                                    </li>
                                 @endforeach    
                                  <!-- <li class="nav-item">
                                      <li><a class="nav-link my-link"  href="{{route('about')}}">about us</a></li>
                                  </li> -->
                                </ul>
                             @endif
                        @endif
                    </div>

                    <a class="off-canvas-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight">
                        <div class="canvas-four-span">
                            <span class="line-one"></span>
                            <span class="line-two"></span>
                            <span class="line-three"></span>
                            <span class="line-four"></span>
                        </div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">
                <a href="index.php"> <img class="off-can-logo" src='{{asset("documents/setting/$settings->footer_logo")}}' alt=""></a>
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <div class="input-group mic-drop dn">
                    <input type="text" class="form-control" placeholder="Seacrch" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <button class="input-group-text" id="basic-addon2"><i
                            class="fa-light fa-magnifying-glass"></i></button>
                </div>


            </ul>
            <ul class="navbar-nav">

              
                @if(isset($categories))
                    @foreach($categories as $key => $item)
                   
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$item->category_name}}
                      </a>
                       @if(isset($item->subcategory))
                          <ul class="dropdown-menu" id="{{$item->category_name}}" aria-labelledby="title{{$item->category_name}}">
                             @foreach($item->subcategory as $val)
                              <li><a class="nav-link my-link"  href="{{route('myfeed',$val->feed)}}">{{$val->title}}</a></li>
                             @endforeach
                          </ul>
                       @endif
                     
                    </li>
                    @endforeach
                  <!--  <li><a class="nav-link my-link"  href="{{route('about')}}">about us</a></li> -->
               @endif
            </ul>

            <form class="d-flex dn">
                <a class="header-bell-btn dn" type="bell"><i class="fa-light fa-bell"></i></a>

            </form>
            <a class="header-account-btn dn" type="submit"><span class="user-icon"><i
                        class="fa-light fa-user"></i></span> Account</a>
        </div>
    </div>
<!-- header selector end -->

<div class="body-section">
@if($data_limit != 1)
    @yield('body_section')
@else
<!--<section class="process-heading-sec">-->
<!--    <div class="container">-->
<!--        <h3>Daily request limit reached</h3>-->
<!--    </div>-->
<!--</section>-->
@yield('body_section')
@endif    
</div>


<!-- Footer Section -->

<footer class="main-footer">
    <div class="footer-line">
        <div class="container">
            <div class="row ">
                <ul class="lf-c d-flex justify-content-between">
                
               @if(count($categories)>0)  
                @foreach($categories as $key => $item)
                  @if($key <=11)
                    <li><a  class="fl"  href="{{route('myfeed',$item->feed)}}">  {{$item->category_name??null}}</a> </li>
                  @endif
                 @endforeach
               @endif     
              <!--   <li><a  class="fl"  href="{{route('terms-conditions')}}">  terms & conditions</a> </li>
                <li><a  class="fl"  href="{{route('policy')}}">  Privacy Policy</a> </li>
                <li><a  class="fl"  href="{{route('cookie')}}">  cookies policy</a> </li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row py-5 pb-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                      @php $settings =  App\Models\Setting::first(); @endphp    
                    <div class="footer-logo">

                            <a href="{{route('index')}}"><img class="main-footer-logo img-fluid" src='{{asset("documents/setting/$settings->footer_logo")}}' alt=""></a>
                        </div>

                        <div class="footer-socials">
                            <div class="ul d-flex">
                                <li class="fi"><a class="fi" href="{{$settings->facebook??null}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                                <li class="fi"><a class="fi" href="{{$settings->twitter??null}}" target="_blank"><i class="fa-brands fa-twitter"></i></a> </li>
                                <li class="fi"><a class="fi" href="{{$settings->pinterst??null}}" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                                <li class="fi"><a class="fi" href="{{$settings->instagram??null}}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li class="fi"><a class="fi" href="{{$settings->youtube??null}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 p-0">
                        <ul class="footer-imgs-sec d-flex">
                            <li class="footer-imgs-sec-m">
                                <div class="footer-headings">
                                    <h5 class="footer-h">
                                        Recent Post
                                    </h5>
                                </div>
                                 @if(isset($recent_post))
                                 @forelse($recent_post as $key => $item) 
                                <div class="footer-content d-flex">
                                    @if(isset($item->type))
                                       
                                        @if($item->type == 'image') 
                                        <img class="footer-imgs" src="{{$item->file??null}}"
                                           alt="">
                                        @else
                                        <img class="footer-imgs" src="{{asset('assets/images/footer-img-one.png')}}" alt="">
                                        @endif
                                        
                                    @else
                                    <img class="footer-imgs" src="{{asset('assets/images/footer-img-one.png')}}" alt="">
                                    @endif
                                
                                    
                                    <div class="footer-content-txt">
                                        <h5 class="fct">
                                            <a data-id="{{$item->id}}" style='color:white;' class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >
                                               {{$item->title??null}}
                                            </a>
                                                        
                                        </h5>
                                        <h6 class="fctd">{{date('m/d/Y', $item->published??null)}}</h6>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="exampleModal9{{$key}}" tabindex="-1"   aria-labelledby="exampleModalLabel9{{$key}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel9{{$key}}">{{$item->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        {!!$item->content!!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                            
                                @empty
                                @endforelse
                                @endif 
                                
                            </li>
                            <li class="footer-imgs-sec-m">
                                <div class="footer-headings">
                                    <h5 class="footer-h">
                                        Popular Post
                                    </h5>
                                </div>
                              @if(count($popular_product)>0)    
                                 @forelse($popular_product as $key => $item)
                                  @if($key >=0 && $key <=2)
                                    <div class="footer-content d-flex">
                                        @if(isset($item->type))
                                           
                                            @if($item->type == 'image') 
                                            <img class="footer-imgs" src="{{$item->file??null}}"
                                               alt="">
                                            @else
                                            <img class="footer-imgs" src="{{asset('assets/images/footer-img-one.png')}}" alt="">
                                            @endif
                                            
                                        @else
                                        <img class="footer-imgs" src="{{asset('assets/images/footer-img-one.png')}}" alt="">
                                        @endif
                                    
                                        
                                        <div class="footer-content-txt">
                                            <h5 class="fct">
                                                    <a data-id="{{$item->id}}" style='color:white;' class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >
                                                 {{$item->title??null}}
                                                </a>
                                            </h5>
                                            <h6 class="fctd">{{date('m/d/Y', $item->published??null)}}</h6>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    
                                @empty
                                @endforelse
                                @endif
                                
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="footer-headings">
                            <h5 class="footer-h">
                                News letter
                            </h5>
                        </div>
                        <h5 class="fct">Subscribe to our mailing list to get the new updates!</h5>
                        <div class="subscribe">
                            <form id="subscribe1" action="{{route('subscribe1')}}" method="POST">
                            <div class="inp-sub">
                                @csrf
                                <input type="email" class="form-control" placeholder="Your email here"
                                    aria-label="Username" name="email" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="subs-button">
                                <button class="sub-btn" type="submit">SUBSCRIBE</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
    	<div class="cpr">
        <div class="cpr-text">
        	<ul>
        		<li><a  class="fl"  href="{{route('terms-conditions')}}">  terms & conditions</a> </li>
                <li><a  class="fl"  href="{{route('policy')}}">  Privacy Policy</a> </li>
                <li><a  class="fl"  href="{{route('cookie')}}">  cookies policy</a> </li>
                <li><a class="fl"  href="{{route('about')}}">about us</a></li>
                <li><a class="fl"  href="{{route('contact-us')}}">contact us</a></li>
        	</ul>
            <h6 class="main-cpr-t">© Copyright EREADIT LLC 2022, All Rights Reserved</h6>
        </div>
    </div>
    </div>
</footer>






<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script type="text/javascript" src="{{asset('assets/js/slick.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/t-scroll.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/waitMe.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

<script>
 var current_effect ='bounce';
     
      
$(".nav_link").click(function(e){
   var category = $(this).attr("data-id")
   var key = $(this).attr("data-key")
   $("#"+key).empty();
  
        $("#"+key).waitMe({
          effect : 'bounce',
          text : '',
          bg : 'rgba(255,255,255,0.7)',
          color : '#000',
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
        });
     
   
          
    $.ajax({
            type: 'GET', 
            url : '{{route("searchCategory")}}', 
            data:{ category: category},
            success : function (data) {
                
                for(var i = 0;i<data.title.length;i++)
                {
                    // console.log(data.feed[i]);
                    // $("#title"+category).html();
                    var url = '{{ route("myfeed", ":id") }}';
                    url = url.replace(':id', data.feed[i]);
                    console.log(data.title[i]);
                    if(data.feed[i])
                    {
                      $("#"+key).append(`<li><a class="dropdown-item" href="${url}">${data.title[i]}</a></li>`);
                        
                    }else{
                        
                    }
                }
                
                $("#"+key).waitMe("hide")
            }
        
    });
});




$(document).on('submit','#subscribe',(e)=> {
        e.preventDefault();
         alert('w');
            let myForm = document.getElementById('subscribe');
            let formData = new FormData(myForm);
            $.ajax({
            method: "POST",
            url: "{{route('subscribe')}}",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
            // window.location = 'thank-you.html';
            }
    })
    })


    var type = "{{ Session::get('type') }}";
      switch (type) {
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;

      }
    
</script>

<script>
        $('#btn-nav-previous').click(function(){
            // alert("left");
        $(".menu-inner-box").animate({scrollLeft: "-=110px"}, 50);
        //   $(".menu-inner-box").scrollLeft( -50 );
    });
    
    $('#btn-nav-next').click(function(){
        // alert("Right");
        $(".menu-inner-box").animate({scrollLeft: "+=110px"}, 50);
        // $(".menu-inner-box").scrollLeft( 50 );
    });
    
    $(document).on("click",".do-comments",function() {
    var product_id = $(this).attr("data-id");
    
       var txt = $("#comment"+product_id).val();
        if(!txt)
        {
            alert('Please enter comments');
            return false;
        }
        $.ajax({
            type: 'GET', 
            url : '{{route("do-comments")}}', 
            data:{ product_id: product_id,txt:txt},
            success : function (data) {
             console.log(data);
             if(data.type == 'success')
             {
                 toastr.success(data.message);
                 $("#comment"+product_id).val("");
             }else{
                toastr.error(data.message); 
             }
            }
        });
    
});

$(document).on("click",".likes-button",function() {
    var product_id = $(this).attr("data-id");
    var liked = $(this).attr('data-like');
   
    $.ajax({
        type: 'GET', 
        url : '{{route("do-like")}}', 
        data:{product_id:product_id,liked:liked},
        success : function (data) {
            if(data.success == 1)
            {
              $("#likes"+product_id).text('Liked');  
            }else{
              $("#likes"+product_id).text('Like');  
            }
         
        }
    });
    
});


$(document).on("click",".likes-button-another",function() {
    var product_id = $("#product_id").val();
    
    var liked = $("#liked").val();
   
    $.ajax({
        type: 'GET', 
        url : '{{route("do-like")}}', 
        data:{product_id:product_id,liked:liked},
        success : function (data) {
            if(data.success == 1)
            {
              $(".likes-button-another").text('Liked');  
            }else{
              $(".likes-button-another").text('Like');  
            }
         
        }
    });
    
});


    $(document).on("click",".do-comment-another",function() {
       var product_id = $("#product_id").val();
       var txt = $("#comment").val();
    
        if(!txt)
        {
            alert('Please enter comments');
            return false;
        }
        $.ajax({
            type: 'GET', 
            url : '{{route("do-comments")}}', 
            data:{ product_id: product_id,txt:txt},
            success : function (data) {
             console.log(data);
             if(data.type == 'success')
             {
                 toastr.success(data.message);
                 $("#comment").val("");
             }else{
                toastr.error(data.message); 
             }
            }
        });
    
});


$(document).on("click",".show-title-desc",function() {
    var id = $(this).attr("data-id");
    $('#container').waitMe({
          effect : 'bounce',
          text : '',
          bg : 'rgba(255,255,255,0.7)',
          color : '#000',
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
          });
          
    $.ajax({
        type: 'GET', 
        url : '{{route("show-title-desc")}}', 
        data:{ id: id},
        success : function (data) {
            $(".p-id").html(`<input type="hidden" id="product_id" value="${data.id}">`)
            $("#exampleModal8").modal('show');
            $("#exampleModalLabel8").text(data.title);
            $(".append_model_data").html(data.content);
            if(data.likes.length>0)
            {
                $(".likes-button-another").text('Liked');
                $(".p-liked").html(`<input type="hidden" id="liked" value="0">`)
            }else{
                $(".likes-button-another").text('Like');
                $(".p-like").html(`<input type="hidden" id="liked" value="1">`)
            }
            $('#container').waitMe("hide")
        }
    });
});


$(document).on("click",".do-commentsss",function() {
    window.location.href = "https://ereadit.com/user-login";
});

$(document).on("click",".likes-buttons",function() {
    window.location.href = "https://ereadit.com/user-login";
});
</script>
</body>

@yield('script_section')
</html>