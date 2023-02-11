@extends('front/master')

@section('title')
Home
@endsection
@section('body_section')
<main>
<style>

.hide-scr iframe::-webkit-scrollbar {
    /*width: 0px !important;*/
    /*height: 0px !important;*/
    display:none !important;
}
.img_dynamic{
       padding-right: 10px !important;
    height: 110px !important;
    width: 110px !important;
    object-fit: cover !important;
    border-radius: 15px !important; 
}
.card-ro-one .like-btn{
        background: #54bac9;
    border: 1px solid #54bac9;
    color: #fff;
    padding: 0px 10px;
    border-radius: 5px;
    transition: 0.5s;
        font-family: "Lato", sans-serif;
        font-size:10px;
}
 .card-ro-one .like-btn:hover {
        background: transparent ;
 }
 .comment-box a {
       background: #b71b21;
    border: 1px solid #b71b21;
    color: #fff;
    padding: 0px 10px;
    border-radius: 5px;
    transition: 0.5s;
    font-size : 12px;
        font-family: "Lato", sans-serif;
 }
    .comment-box .input-group {
        margin-top: 10px;
    }
  .comment-box .comment-field {
          background: transparent;
    border-radius: 10px;
    padding: 2px 0 2px 15px;
    font-size: 12px;
    color: #fff;
        font-family: "Lato", sans-serif;
  }
    .comment-box .sub-btn {
        background: #5aa7d8;
    border: 1px solid #5aa7d8;
    color: #fff;
    font-size: 14px;
    font-family: "Lato", sans-serif;
}
    }
/*///new mrx//*/
.main-home .left-right-btns-tabs{margin: 0 0 0 7px !important;font-size: 13px !important;font-weight: 600 !important;padding: 10px 7px !important;}
.main-home .left-right-btns-tabs-o{font-size: 13px;color: #fff !important;font-weight: 600 !important;padding: 10px 7px !important;margin-left: 0px !important;}
.main-home .p-card-h {
  padding: 0 0 8px !important;
}
.main-home .main ul {
     background-color: unset; 
    border: 0;
    width: 89% !important;
}
.main-home .main {
    background-color: #707070 !important;
    border: 0;
    width: 100%  !important;
}

.main-home .main .arrows {
    width: 11% !important;
    display: flex !important;
}
 .main-home .main .arrows li {
    list-style: none !important;
}
.main-home .main .arrows button {
    color: #fff !important;
}
.hide-scr{
    margin-bottom : 20px;
}
.VIEWed-main ul li iframe , img {
    width: auto;
    height: 100px;
    object-fit: cover ;
}
.modal-backdrop{
z-index: -1;
}

.modal{
    color:#000;
}
</style>
<section class="main-home">
    <div class="container">
        <div class="row pt-4">
            @if(isset($four_data_from_db))
            @forelse($four_data_from_db as $key => $item1) 
               
            <div data-aos="zoom-in" data-aos-duration="900"
                class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                <a href="{{route('myfeed',$item1->streamId)}}">
                    <div class="news-img">
                        @php
                        $html = $item1->content;
                        preg_match( '@src="([^"]+)"@' , $html, $match );
                        $src = array_pop($match);
                        @endphp
                      
                       @if(isset($src))
                            <img class="main-d-two-img img-fluid" src="{{$src}}"
                                       alt="">
                                     
                       @elseif($item1->type == 'image') 
                        <img class="main-d-two-img img-fluid" src="{{$item1->file}}"
                           alt="">
                        @elseif($item1->type == 'video')
                        <iframe  class="main-d-two-img img-fluid" src="{{$item1->file}}" ></iframe>
                        @elseif($item1->type == 'audio')
                        <audio controls>
                            <source src="{{$item1->file}}" > 
                        </audio>
                        @else
                        <img class="main-d-two-img img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                        @endif
                                
                       <div class="overlay"></div>
                        <div class="home-imgs-ab">
                            <div class="card-ro-one">
                                <div class="world">{{$item1->category_name}}</div>
                                <div class="TonY"></div>
                                <div class="dash">-</div>
                                <div class="frinkn-date">
                                    {{$item1->author_name??null}}  @php $pub =  date('m/d/Y', $item1->published) @endphp {{\Carbon\Carbon::parse($pub)->diffForHumans()}}
                                </div>
                            </div>
                            <div class="card-main-h">
                            {{$item1->title}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            @empty
            @endforelse
        @endif
        </div>

        <!-- h start -->
        <div class="row pt-3">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                <div data-aos="fade-right" data-aos-duration="900" class="career-box">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8 myTabContentvideo">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    @php $one =  App\Models\Product::inRandomOrder()->where('type','video')->Orwhere('type','image')->first();  @endphp
                                    <div class="content-box">
                                        <div class="img-box">
                                             @if($one->type == 'image')
                                                <img class="img-fluid" src="{{$one->file}}" alt="">
                                                <div class="overlay"></div>
                                               
                                            @elseif($one->type == 'video')
                                             <iframe  class="img-fluid" src="{{$one->file}}" ></iframe>
                                            @endif
                                            
                                        </div>
                                        <div class="text-box">
                                            <p class="para show-title-desc" data-id="{{$one->id}}">- {{$one->author_name??null}} @php $pub =  date('m/d/Y', $one->published) @endphp {{\Carbon\Carbon::parse($pub)->diffForHumans()}} </p>
                                            <h6>{{$one->title??null}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div id="append_video"></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4">
                            <div class="tab-list">
                                <div class="black-box">
                                    <ul class="video-play">
                                        <li><i class="fa-solid fa-play"></i></li>
                                        <li>
                                            <h6>{{implode(' ', array_slice(str_word_count($one->title??null, 2), 0, 10))}}</h6>
                                            <p class="para">{{$one->author_name??null}} @php $pub =  date('m/d/Y', $one->published)  @endphp &nbsp;&nbsp;&nbsp; {{\Carbon\Carbon::parse($pub)->diffForHumans()}}</p>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="nav" id="myTab" role="tablist">
                                    @if(isset($product))
                                     @foreach($product as $key => $item)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active clickbyvideo" data-id="{{$item->id}}" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="true">
                                            <ul class="inner-list">
                                                <li><span>{{$key+1}}</span></li>
                                                <li>
                                                    <div class="play-icon">
                                                        @if($item->type == 'image')
                                                        <img class="img-fluid" src="{{$item->file??null}}" alt="">
                                                        @elseif($item->type == 'video')
                                                         <iframe  class="img-fluid" src="{{$item->file??null}}" ></iframe>
                                                        @endif
                                                        <i class="fa-solid fa-play"></i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h6>{{$item->title??null}}</h6>
                                                    <p class="para">{{$item->author_name??null}} @php $pub =  date('m/d/Y', $item->published) @endphp {{\Carbon\Carbon::parse($pub)->diffForHumans()}}</p>
                                                </li>
                                            </ul>
                                        </button>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- hasnain -->
                 <div class="row">
                   
                   @if(isset($twoProduct))
                  
                   @forelse($twoProduct as $key => $item) 
                    @if($key == 0)
                     
                    <div data-aos="zoom-in" data-aos-duration="900" class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="news-img">
                       @php
                        $html = $item->content;
                        preg_match( '@src="([^"]+)"@' , $html, $match );
                        $src = array_pop($match);
                        
                        @endphp
                          @if(isset($src))
                            <img class="home-img-of-news img-fluid" src="{{$src}}"
                                       alt="">
                           @elseif(isset($item->type))
                               
                                @if($item->type == 'image') 
                                <img class="home-img-of-news img-fluid" src="{{$item->file}}"
                                   alt="">
                                @elseif($item->type == 'video')
                                <iframe  class="home-img-of-news img-fluid" src="{{$item->file}}" ></iframe>
                                @elseif($item->type == 'audio')
                                <audio controls>
                                    <source src="{{$item->file}}" > 
                                </audio>
                                @else
                                <img class="home-img-of-news img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                                @endif
                                
                            @else
                            <img class="home-img-of-news img-fluid" src="assets/images/home-img-third-sec.png" alt="">
                            
                            @endif 

                            <div class="overlay"></div>
                            <div class="home-imgs-ab">
                                <div class="card-ro-one">
                                    <div class="tech"> {{$item->category_name??null}}</div>
                                    <div class="TonY">by {{$item->author_name??'admin'}}</div>
                                    <div class="dash">-</div>
                                    <div class="frinkn-date">
                                        
                                    </div>

                                </div>
                                <div class="card-main-t">
                                    @if(isset($item->treamId))
                                    <a  href="{{route('myfeed',$item->treamId??null)}}" target="_blank" style="color:white"> {{$item->title}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endif

                    @if($key == 1)
                    <div data-aos="zoom-in" data-aos-duration="1500"
                        class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
                        <div class="news-img">
                        @php
                        $html = $item->content;
                        preg_match( '@src="([^"]+)"@' , $html, $match );
                        $src = array_pop($match);
                        @endphp
                          @if(isset($src))
                           <img class="home-img-of-news img-fluid" src="{{$src}}"
                                       alt="">
                          @elseif(isset($item->type))
                                
                                @if($item->type == 'image') 
                                <img class="home-img-of-news img-fluid" src="{{$item->file??null}}"
                                   alt="">
                                @elseif($item->type == 'video')
                                
                                 <iframe  class="home-img-of-news img-fluid" src="{{$item->file??null}}" ></iframe>  
                                @elseif($item->type == 'audio')
                                <audio controls>
                                    <source src="{{$item->file??null}}" > 
                                </audio>
                                @else
                                <img class="home-img-of-news img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                                @endif
                                
                                  
                                    
                            @else
                            <img class="home-img-of-news img-fluid" src="assets/images/home-img-third-sec.png" alt="">
                            
                            @endif 

                            <div class="overlay"></div>
                            <div class="home-imgs-ab">
                                <div class="card-ro-one">
                                    <div class="sports"> {{$item->category_name??null}}</div>
                                    <div class="TonY">{{$item->author_name??'admin'}} Post</div>
                                    <div class="dash">-</div>
                                    <div class="frinkn-date">
                                       
                                    </div>

                                </div>
                                <div class="p-card-h">
                                    <h5 class="main-txt-card-p">
                                   @if(isset($item->streamId))        
                                    <a  href="{{route('myfeed',$item->streamId)}}" style="color:white" target="_blank"> {{$item->title}}</a>
                                    @endif
                                    </h5>
                                </div>
                                <div class="card-main-p">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @empty
                    @endforelse
                    @endif
                </div>
                <div class="row pt-3">

                    <div data-aos="zoom-in" data-aos-duration="1500"
                        class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="main" style=" overflow-x: hidden;">
                               <div class="secc-main" style="width: 100%;
                                display: flex;">
                                <ul class="nav menu-inner-box" id="myTab" role="tablist" style="white-space: nowrap; flex-wrap: nowrap; overflow-y: hidden; overflow-x: hidden;">
                                    <li class="before" style="position: fixed;">
                                        <h4>LISFESTYLE</h4>
                                    </li>
                                     <li class="nav-item" role="presentation" style="margin-left: 138px;">
                                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                            data-bs-target="#all" type="button" role="tab" aria-controls="all"
                                            aria-selected="true">All</button>
                                    </li>
                                
                                    @if(isset($categories))
                                       @foreach($categories as $key => $item)
                                        
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link byCategoryDatabase active" data-id = "{{$item->feed}}" id="food-tab" data-bs-toggle="tab"
                                                data-bs-target="#food" type="button" role="tab" aria-controls="food"
                                                aria-selected="false">{{$item->category_name}}</button>
                                        </li>
                                        @endforeach
                                    @else
                                     @if(isset($categories))
                                       @foreach($categories as $key => $item)
                                         
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link byCategoryDatabase" data-id = "{{$item->feed}}" id="food-tab" data-bs-toggle="tab"
                                                    data-bs-target="#food" type="button" role="tab" aria-controls="food"
                                                    aria-selected="false">{{$item->category_name}}</button>
                                            </li>
                                        @endforeach 
                                       @endif    
                                    @endif
                                   
                                    
                                </ul>
                                <div class="arrows">
                                     <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="PoliticalBlogs-tab" data-bs-toggle="tab"
                                            data-bs-target="#PoliticalBlogs" type="button" role="tab"
                                            aria-controls="PoliticalBlogs" aria-selected="false">| <span
                                                class="left-right-btns-tabs" id="btn-nav-previous"><i
                                                    class="fa-solid fa-arrow-left-long"></i></span> <span
                                                class="left-right-btns-tabs-o" id="btn-nav-next"><i
                                                    class="fa-solid fa-arrow-right-long"></i></span></button>
                                    </li>
                                </div>
                             </div>    
                            <div class="tab-content" id="myTabContent">

                               <div class="tab-pane fade show active" id="all" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="main-div">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div
                                                            class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                            <div class="img-div">
                                                                
                                                                 @if($one->type == 'image')
                                                                    <img class="mt-img img-fluid" src="{{$one->file??null}}"  class="img-fluid" alt="">
                                                                    @elseif($one->type == 'video')
                                                                    <iframe  class="mt-img img-fluid" src="{{$one->file??null}}" ></iframe>
                                                                    @endif
                                                                
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 ">
                                                            <div class="con-div">
                                                                <div class="first">
                                                                    <!--<h6>By <span class="name">Tonny Kross</span>-->
                                                                    <!--    &nbsp;-&nbsp;-->
                                                                    <!--    <span class="date">Jun 20, 2022</span>-->
                                                                    <!--</h6>-->
                                                                </div>
                                                                <div class="sec">
                                                                    <h3>Happy Woman On Street</h3>
                                                                    <p>{{$one->title??null}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <div class="main-two">
                                               
                                                        <div class="row">
                                                            @php 
                                                           $myproducts =  App\Models\Product::inRandomOrder()->take(8)->where('type','video')->Orwhere('type','image')->get()
                                                            @endphp
                                                            @forelse($myproducts as $key=> $item)
                                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                <div class="main-mar">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-12">
                                                                            <div class="img-div">
                                                                                @if($item->type == 'image')
                                                                                <img class="mt-img img-fluid" src="{{$item->file??null}}" alt="">
                                                                                @elseif($item->type == 'video')
                                                                                <iframe  class="mt-img img-fluid" src="{{$item->file??null}}" ></iframe>
                                                                                @endif
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-lg-8">
                                                                            <div class="con-div">
                                                                                <div class="sec">
                                                                                    <h3>
                                                                                        
                                                                                        <a data-id="{{$item->id}}" class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >
                                                                                            {{$item->title}}
                                                                                         </a>
                                                                                        </h3>
                                                                                    <div class="first">
                                                                                        <h6><span class="date">{{date('m/d/Y', $item->published)}}</span></h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="modal fade" id="exampleModal5{{$key}}" tabindex="-1"   aria-labelledby="exampleModalLabel5{{$key}}" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel5{{$key}}">{{$item->title}}</h5>
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
                                                                             
                                                        </div>
                                                       
                                                    </div>
                                              </div>

                                            </div>
                                        </div>
                                    </div>


                                <div class="tab-pane fade" id="food" role="tabpanel" aria-labelledby="food-tab">
                                    <div class="main-div">
                                    <div class="row">
                                            <div class="col-12" id="loader">
                                                <div class="row">
                                                    <div
                                                        class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                        <div class="img-div">
                                                            <img src="assets/images/bg.png" class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 ">
                                                        <div class="con-div">
                                                            <div class="first">
                                                                <h6>By <span class="name">Tonny Kross</span>
                                                                    &nbsp;-&nbsp;
                                                                    <span class="date">Jun 20, 2022</span>
                                                                </h6>
                                                            </div>
                                                            <div class="sec">
                                                                <h3>Happy Woman On Street</h3>
                                                                <p>Stay focused and remember we design the best News
                                                                    and
                                                                    Magazine PSD Template. It’s the ones closest to
                                                                    you that
                                                                    want to …</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="main-two">
                                                   <div class="row gy-3" id="append_section">
                                                         <div ></div> 
                                                    </div>
                                                   
                                                </div>
                                        </div>

                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>

                </div>
                
                
                <!-- Html -->
            
                <!--End Html-->
                <div class="row pt-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="latst-artical">
                            <div class="la-bg">
                                <h5 class="la-t">LATEST ARTICLES</h5>
                            </div>
                        </div>
                        <div class="pb-5">
                            <div class="row ">
                                
                               
                                <!-- Get data from database -->
                                  
                                    @if(isset($latest_article))
                                        @foreach($latest_article as $key => $item)
                                            <div data-aos="fade-right" data-aos-duration="1500"
                                                class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                <div class="card-body-d-two">
                                                    <div class="card-img">
                                                           @php
                                                            $html = $item->content;
                                                            preg_match( '@src="([^"]+)"@' , $html, $match );
                                                            $src = array_pop($match);
                                                            @endphp
                                                            @if(isset($src)) 
                                                            <img class="home-img-of-news img-fluid" src="{{$src}}"
                                                                   alt="">
                                                           @elseif($item->type)
                                                               @if($item->type == 'image') 
                                                                <img class="home-img-of-news img-fluid" src="{{$item->file}}"
                                                                   alt="">
                                                                @elseif($item->type == 'video')
                                                                <iframe  class="home-img-of-news img-fluid" src="{{$item->file}}" ></iframe>
                                                                @elseif($item->type == 'audio')
                                                                <audio controls>
                                                                    <source src="{{$item->file}}" > 
                                                                </audio>
                                                                @else
                                                                <img class="home-img-of-news img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                                                                @endif
                                                            @else
                                                            <img class="main-d-two-img img-fluid" src="{{asset('assets/images/desk-two-img-one.png')}}" alt="">
                                                            @endif    
                                                                
                                                        
                                                    </div>
                                                    <!--  -->
                                                    <div class="card-ro-one">
                                                        <div class="lisfe-styl">
                                                            <!-- LIFE STYLE -->
                                                            {{$item->category_name}}
                                                        </div>
                                                        <div class="TonY"><span class="tnoy-span-wit">by </span> {{$item->author_name??'admin'}}
                                                        </div>
                                                        <div class="dash">-</div>
                                                        <div class="frinkn-date">
                                                            {{date('m/d/Y', $item->published)}}
                                                        </div>
                                                        @if(Auth::check())
                                                          @if(count($item->likes)>0)
                                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}" data-like = "0"  class="like-btn likes-button">Liked</button>
                                                          @else
                                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}" data-like = "1" class="like-btn likes-button">Like</button>
                                                          @endif
                                                        @else
                                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}"  class="like-btn likes-buttons">Like</button>
                                                        @endif
            
                                                    </div>
                                                    <div class="comment-box">
                                                        <a href="javascript:;">Comments</a>
                                                        <div class="input-group">
                                                        <input type="text" id="comment{{$item->id}}"class="form-control comment-field" placeholder="Write Your Comment" aria-describedby="basic-addon2">
                                                          @if(Auth::check())
                                                          <button class="input-group-text sub-btn do-comments" data-id="{{$item->id}}" id="basic-addon2">Submit</button>
                                                          @else
                                                          <button class="input-group-text sub-btn do-commentsss" data-id="{{$item->id}}" id="basic-addon2">Submit</button>
                                                          @endif
                                                          
                                                        </div>
                                                       
                                                    </div>
                                                      <div class="card-main-t">
                                                          <a data-id="{{$item->id}}" class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >
                                                           {{$item->title}}
                                                        </a>
                                                    </div>
            
                                                    <div class="para-card"></div>
            
                                                </div>
                                            </div>
                                                          
                                            
                                        @endforeach
                                    @endif
                                
                             
                                

                            </div>
                        </div>

                        <!-- separat -->
                      
                        <!-- seprate -->

                        <!-- last seprate  -->
                       
                        <!--<a class="lmp-btn" href="javascript:;">-->
                        <!--    LOAD MORE POST-->
                        <!--    </a>-->
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3">
                <div class="row">
                    <div data-aos="fade-left" data-aos-duration="1500"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="mini_tabs">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true"><span>RECENT</span></button>

                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile"
                                        aria-selected="false"><span>POPULAR</span></button>
                                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" type="button" role="tab"
                                        aria-controls="nav-contact"
                                        aria-selected="false"><span>COMMENTS</span></button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <ul class="scroll_txt">
                                    @if(isset($recent_product))
                                    
                                          @forelse($recent_product as $key=> $item) 
                                          
                                            @php
                                            $html = $item->content;
                                            preg_match( '@src="([^"]+)"@' , $html, $match );
                                            $src = array_pop($match);
                                            @endphp
                                            <li>
                                                @if(isset($src))
                                                <img src="{{$src}}" class="tabs-img img-fluid" alt="">
                                                @elseif($item->type == 'image')
                                                <img src="{{$item->file}}" class="tabs-img img-fluid" alt="">
                                                @elseif($item->type == 'video')
                                                <iframe  class="tabs-img img-fluid" src="{{$item->file}}" ></iframe>
                                                @endif    
                                               
                                              <a data-id="{{$item->id}}" class=" mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >
                                                         <h6 style="color:#f6f6f6;">    {{$item->title??null}}
                                                       
                                                    
                                                <br>
                                                    <span>{{date('m/d/Y', $item->published??null)}}</span></h6> </a>
                                            </li>
                                            
                                                            
                                            @endforeach
                                     @else
                                     <li>
                                     <h6>No data found</h6>
                                     </li>
                                     @endif   
                                       
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <ul class="scroll_txt">
                                        @if(count($popular_product)>0)
                                        @foreach($popular_product as $key=> $item)
                                            <li>
                                                 @if($item->type == 'image')
                                                <img src="{{$item->file}}" class="tabs-img img-fluid" alt="">
                                                @elseif($item->type == 'video')
                                                <iframe  class="tabs-img img-fluid" src="{{$item->file}}" ></iframe>
                                                @endif  
                                                
                                                <a  data-id="{{$item->id}}" class=" mostViewd show-title-desc" data-published = "{{$item->published}}" type="button">
                                                         <h6 style="color:#f6f6f6;">    {{$item->title??null}}
                                                       
                                                    
                                                <br>
                                                    <span>{{date('m/d/Y', $item->published??null)}}</span></h6> </a>
                                            </li>
                                            
                                         @endforeach
                                        @endif
                                        
                                       
                                        
                                       
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <ul class="scroll_txt">
                                        @if(count($comments_product)>0)
                                        @foreach($comments_product as $item)
                                            <li>
                                                 @if($item->type == 'image')
                                                <img src="{{$item->file}}" class="tabs-img img-fluid" alt="">
                                                @elseif($item->type == 'video')
                                                <iframe  class="tabs-img img-fluid" src="{{$item->file}}" ></iframe>
                                                @endif  
                                                
                                                <h6>{{$item->title??null}}<br><span>{{date('m/d/Y', $item->published??null)}}</span></h6>
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1800"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="wether-text">
                            <div class="image_div">
                                <img src="assets/images/cloude.png" class="img-fluid" alt="">
                                <h5>USA</h5>
                                <p>Florida, Orlando</p>
                            </div>
                            <div class="degree-text">
                                <h3>28 ˚C</h3>
                                <ul>
                                    <li><span><i class="fa-solid fa-temperature-three-quarters"></i></span> 28 ˚C -
                                        30 ˚C</li>
                                    <li><span><i class="fa-solid fa-droplet"></i></span>60 %</li>
                                    <li><span><i class="fa-regular fa-cloud"></i></span>73 miles/h</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="2000"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="magazine_img">
                            <img src="assets/images/img2.png" class="admag-img img-fluid" alt="">
                            <h3 class="head1">ADD MAGZINE REPONSIVE NEWSPAPER AND MAGAZINE</h3>
                            <ul>
                                <li class="admag text-center">ADS<br> <span class="admags">336 x 280</span></li>
                                <li><a href="javascript:;">BUY NOW</a></li>
                            </ul>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="2200"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="VIEWed-main">
                            <h5 class="head_5">MOST VIEWED</h5>
                            <div class="VIEWED TEXT">
                                <div class="row">
                                    
                             
                                  @if(isset($latest_views))
                                   @foreach($latest_views as $item)
                                     @php
                                        $html = $item->content;
                                        preg_match( '@src="([^"]+)"@' , $html, $match );
                                        $src = array_pop($match);
                                       
                                        @endphp
                                      
                                        
                                         <div class="col-5">
                                             <div class="hide-scr">
                                            @if(isset($src))
                                            
                                            <img class="test img-fluid" src="{{$src}}"  alt="">
                                            @elseif($item->type == 'image')
                                            <img class="test" src="{{$item->file}}"  alt="">
                                            @elseif($item->type == 'video')
                                            <iframe  src="{{$item->file}}" ></iframe>
                                            @endif
                                           </div>
                                         </div>
                                           <div class="col-7">
                                                 <h6 class='show-title-desc' data-id="{{$item->id}}" >{{$item->title}}
                                            <br><span>{{date('m/d/Y', $item->published??null)}}</span>
                                        </h6>
                                          </div>
                                       
                                    
                                    @endforeach
                                  @endif        
                               
                                
                                </div>
                                <!-- Old data-->
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="2400"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="VIEWed-main">
                            <h5 class="head_5 hd-6">LIFE STYLE</h5>
                            <div class="VIEWED TEXT">
                                <ul>
                                    
                                    
                                         @if(isset($lifeStyle))
                                             @foreach($lifeStyle as $item)
                                                <li>
                                                    @php
                                                    $html = $item->content;
                                                    preg_match( '@src="([^"]+)"@' , $html, $match );
                                                    $src = array_pop($match);
                                                    
                                                    @endphp
                                                    @if(isset($src))
                                                     <img class="ploic-card-img img-fulid img_dynamic" src="{{$src}}"
                                                               alt="">
                                                    @elseif($item->type == 'image') 
                                                   <img class="ploic-card-img img-fulid img_dynamic" src="{{$item->file}}"
                                                       alt="">
                                                    @elseif($item->type == 'video')
                                                    <iframe  class="ploic-card-img img-fulid img_dynamic" src="{{$item->file}}" ></iframe>
                                                    @elseif($item->type == 'audio')
                                                    <audio controls>
                                                        <source src="{{$item->file}}" > 
                                                    </audio>
                                                    @else
                                                         <img src="{{asset('assets/images/img3.png')}}" class="house-desing-img img-fluid" alt="">
                                                   @endif
                                                    <h6 class='show-title-desc' data-id="{{$item->id}}">{{$item->title??null}}
                                                        <br><span>{{date('m/d/Y', $item->published??null)}}</span>
                                                    </h6>
                                                </li>
                                              @endforeach    
                                         @endif
                                   </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div data-aos="fade-left" data-aos-duration="2600"
                        class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                        <div class="VIEWed-main2">
                            <h5 class="head_5">TAG</h5>
                            <div class="tags-txt2">
                                <p>Audio Demo Design Embed <span>Example</span>Featured Image <span
                                        class="para-8">Gallery Image</span> Media Post Format Soundcloud <span>Video
                                        Vimeo</span>YouTube</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>

 <div class="info-modal-sec">
     <div class="modal fade" id="exampleModal8" tabindex="-1"   aria-labelledby="exampleModalLabel8" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel8"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
            </div>
            <div class="modal-body append_model_data">
            
            </div>
            <div class="p-id"></div>
            <div class="p-liked"></div>
            <div class="p-like"></div>
            <div class="modal-footer">
                
                <div class="comment-box ">
                    <a href="javascript:;">Comments</a>
                    @if(Auth::check())
                      <button  class="like-btn likes-button-another">Like</button>
                    @else
                    <button class="like-btn likes-buttons">Like</button>
                    @endif
                    <div class="input-group ">
                      <input type="text" id="comment" class="form-control comment-field" placeholder="Write Your Comment" aria-describedby="basic-addon2">
                        @if(Auth::check())
                        
                        <button class="input-group-text sub-btn do-comment-another" id="basic-addon2">Submit</button>
                        @else
                        <button class="input-group-text sub-btn do-commentsss" id="basic-addon2">Submit</button>
                        @endif
                    </div>
                   
                </div>
                
                <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
               
            </div>
            </div>
        </div>
    </div>
 </div>

</main>
@endsection

@section('script_section')
<script src="{{asset('assets/js/waitMe.js')}}"></script>
<script>
     var current_effect ='bounce';
      function loader()
      {
        $('#loader').waitMe({
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
      }


    $(".byCategory").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr("data-id");
    $("#append_section").empty();
    loader()
        $.ajax({
            type: 'GET', 
            url : '{{route("myfeed-by-category")}}', 
            data:{ url: url},
            success : function (data) {
            var items = data.items;
           console.log(data.items)
           for(var i = 0;i<items.length;i++)
           {
            const timestamp = 1668790320;
            const date = new Date(timestamp * 1000);
            date.getFullYear(),
            date.getMonth()+1,
            date.getDate(),
            published =  date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
             if(items[i].enclosure)
             {
               img =  items[i].enclosure[0].href
             }else{
               img = 'assets/images/mini_img9.png';     
             }
           $("#append_section").append(`<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="main-mar">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="img-div">
                                        <img src="${img}"
                                            class="mt-img img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="con-div">
                                        <div class="sec">
                                            <h3><a href="#!">${items[i].title}</a></h3>
                                            <div class="first">
                                                <h6><span class="date">${published}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
                   
                   
             
           }
           $('#loader').waitMe("hide")
                                             
        
        }
    });
});

$(".byCategoryDatabase").click(function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var url = $(this).attr("data-id");
   
    $("#append_section").empty();
    
     loader()
        $.ajax({
            type: 'GET', 
            url : '{{route("myfeed-by-category-database")}}', 
            data:{ url: url},
            success : function (data) {
           
           for(var i = 0;i<data.length;i++)
           {
            const timestamp = data[i].published;
            const date = new Date(timestamp * 1000);
            date.getFullYear(),
            date.getMonth()+1,
            date.getDate(),
             published =  date.getDate()+"/"+date.getMonth()+"/"+date.getFullYear();
            
             if(data[i].type)
             {
                 if(data[i].type == 'image')
                 {
                     img = `<img src="${data[i].file}"  class="mt-img img-fluid" alt="">`;
                 }
                 if(data[i].type == 'video')
                 {
                     img = `<video width="400" class="mt-img img-fluid"  controls>
                                        <source src="${data[i].file}"  type="video/mp4">
                            </video>`;
                 }
                 
                 if(data[i].type == 'audio')
                 {
                     img = `<audio controls>
                                <source src="${data[i].file}" > 
                            </audio>`;
                 }
                 
                
             }else{
               img = `<img src="assets/images/mini_img9.png"  class="mt-img img-fluid" alt="">`;
               
             }
           $("#append_section").append(`<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <div class="main-mar">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="img-div">
                                        ${img}
                                    </div>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <div class="con-div">
                                        <div class="sec">
                                            
                                            <h3><a data-id = "${data[i].id}" type="button" class="show-title-desc" style="color:white;"  href="#!">${data[i].title}</a></h3>
                                            <div class="first">
                                                <h6><span class="date">${published}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
                    
                    // $("#exampleModalLabel8").text(data[i].title);
                    // $(".append_model_data").html(data[i].content);
                    
             
           }
           $('#loader').waitMe("hide")
                                             
        
        }
    });
    
    
});

$(".clickbyvideo").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var id = $(this).attr("data-id");
    $("#append_video").empty();
    $("#home").hide();
    $('.myTabContentvideo').waitMe({
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
            url : '{{route("clickbyvideo")}}', 
            data:{ id: id},
            success : function (data) {
                
                if(data.type == 'image')
                {
                    img = `<img  class="img-fluid" src="${data.file}" ></img>
                            <div class="overlay"></div>
                            `;
                }else if(data.type == 'video')
                {
                    img = `<iframe  class="img-fluid" src="${data.file}" ></iframe>`;

                }
                
                $("#append_video").append(`<div class="tab-pane fade  show active" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="content-box">
                                <div class="img-box">
                                    ${img}
                                </div>
                                <div class="text-box">
                                    <p class="para">${data.author_name} - 8 mins ago</p>
                                    <h6>
                                      <a data-published = "" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal8" style="color:white;"  href="#!">${data.title}</a>
                                    </h6>
                                </div>
                            </div>
                        </div>`);
                    $("#exampleModalLabel8").text(data.title);
                    $(".append_model_data").html(data.content);
            $('.myTabContentvideo').waitMe("hide")
            }
    });
    
});

$('.mostViewd').click(function(){
    var id = $(this).attr("data-published");
    $.ajax({
        type: 'GET', 
        url : '{{route("addView")}}', 
        data:{ id: id},
        success : function (data) {
           
        }
    });
});




// $(document).on("click",".show-title-desc",function() {
//     var id = $(this).attr("data-id");
//     $('#container').waitMe({
//           effect : 'bounce',
//           text : '',
//           bg : 'rgba(255,255,255,0.7)',
//           color : '#000',
//           maxSize : '',
//           waitTime : -1,
//           textPos : 'vertical',
//           fontSize : '',
//           source : '',
//           onClose : function() {}
//           });
          
//     $.ajax({
//         type: 'GET', 
//         url : '{{route("show-title-desc")}}', 
//         data:{ id: id},
//         success : function (data) {
//             $(".p-id").html(`<input type="hidden" id="product_id" value="${data.id}">`)
//             $("#exampleModal8").modal('show');
//             $("#exampleModalLabel8").text(data.title);
//             $(".append_model_data").html(data.content);
//             if(data.likes.length>0)
//             {
//                 $(".likes-button-another").text('Liked');
//                 $(".p-liked").html(`<input type="hidden" id="liked" value="0">`)
//             }else{
//                 $(".likes-button-another").text('Like');
//                 $(".p-like").html(`<input type="hidden" id="liked" value="1">`)
//             }
//             $('#container').waitMe("hide")
//         }
//     });
// });


// $(document).on("click",".do-comments",function() {
//     var product_id = $(this).attr("data-id");
    
//       var txt = $("#comment"+product_id).val();
//         if(!txt)
//         {
//             alert('Please enter comments');
//             return false;
//         }
//         $.ajax({
//             type: 'GET', 
//             url : '{{route("do-comments")}}', 
//             data:{ product_id: product_id,txt:txt},
//             success : function (data) {
//              console.log(data);
//              if(data.type == 'success')
//              {
//                  toastr.success(data.message);
//                  $("#comment"+product_id).val("");
//              }else{
//                 toastr.error(data.message); 
//              }
//             }
//         });
    
        
    
// });

// $(document).on("click",".likes-button",function() {
//     var product_id = $(this).attr("data-id");
//     var liked = $(this).attr('data-like');
   
//     $.ajax({
//         type: 'GET', 
//         url : '{{route("do-like")}}', 
//         data:{product_id:product_id,liked:liked},
//         success : function (data) {
//             if(data.success == 1)
//             {
//               $("#likes"+product_id).text('Liked');  
//             }else{
//               $("#likes"+product_id).text('Like');  
//             }
         
//         }
//     });
    
// });
// $(document).on("click",".do-commentsss",function() {
//     window.location.href = "https://ereadit.com/user-login";
// });

// $(document).on("click",".likes-buttons",function() {
//     window.location.href = "https://ereadit.com/user-login";
// });



</script>
@endsection