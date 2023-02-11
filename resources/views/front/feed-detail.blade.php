@extends('front/master')

@section('title')
Feed Detail
@endsection
@section('body_section')
<main>

    <section class="main-Business">
        <div class="container">
            
            <div class="row pt-5 gy-4">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 myslider">
                    <div class="main-img-slider">
                    @if(isset($products))
                        @forelse($products as $item) 
                         @php
                            $html = $item->content;
                            preg_match( '@src="([^"]+)"@' , $html, $match );
                            $src = array_pop($match);
                         @endphp
                        <div class="slider-images">
                            <div class="card-body-politcs-slider">
                                <div class="card-img">
                                  
                               
                                @if($item->type)
                                   @if($item->type == 'image') 
                                   <img class="main-slid-two-img img-fluid" src="{{$item->file}}"
                                       alt="">
                                   @elseif($item->type == 'audio')
                                   <script>
                                      $(".myslider").hide();
                                  </script>
                                   @else
                                    <img class="main-slid-two-img img-fluid" src="{{asset('assets/images/entertainment-slider-img.png')}}" alt="">
                                  @endif
                                
                                
                                @else
                                 <script>
                                      $(".myslider").hide();
                                  </script>
                                <!--<img class="home-img-of-news img-fluid" src="{{asset('assets/images/entertainment-slider-img.png')}}" alt="">-->
                                @endif  
        
                                </div>
                                <!--  -->
                                <div class="slider-txt">
                                    <div class="card-ro-one">
                                        <div class="tech">{{$item->category_name}}</div>
                                        <div class="TonY"><span class="tnoy-span-wit">by </span> {{$item->author_name??'admin'}}</div>
                                        <div class="dash">-</div>
                                        <div class="frinkn-date">
                                        {{date('m/d/Y', $item->published??null)}}
                                        </div>

                                    </div>
                                    <div class="card-main-t">
                                        {{$item->title??null}}
                                    </div>
                                    <div class="para-card">
                                        {{$item->origin_title??null}}
                                    </div>
                                </div>
                            </div>
                        </div>
                       @endforeach
                      @endif

                    </div>
                </div>
                
                
                
                
               @if(isset($products))
               
                @forelse($products as $key => $item) 
                   @php
                    $html = $item->content;
                    preg_match( '@src="([^"]+)"@' , $html, $match );
                    $src = array_pop($match);
                    @endphp
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 panel ">
                        <div class="politics-card h-100">
                            @if(isset($src))
                            <img class="ploic-card-img img-fulid" src="{{$src}}"
                                       alt="">
                            @elseif(isset($item->type))
                              @if($item->type == 'image') 
                                   <img class="ploic-card-img img-fulid" src="{{$item->file}}"
                                       alt="">
                                    @elseif($item->type == 'video')
                                    <iframe  class="ploic-card-img img-fulid" src="{{$item->file}}" ></iframe>
                                    @elseif($item->type == 'audio')
                                    <audio controls>
                                        <source src="{{$item->file}}" > 
                                    </audio>
                                    @else
                                        <img class="ploic-card-img img-fulid" src="{{asset('assets/images/entertainment-card-img-one.png')}}" alt="">
                                 @endif
                             @endif    
                                
                             <div class="politics-card-text">
                                <div class="card-ro-one">
                                    <div class="TonY"><span class="tnoy-span">by </span> {{$item->author_name??'admin'}}</div>
                                    <div class="dash">-</div>
                                    <div class="frinkn-date">
                                    {{date('m/d/Y', $item->published??null)}}
                                    </div>

                                </div>
                                
                                <div class="comment-box comment-box-pad">
                                        <a href="javascript:;">Comments</a>
                                        @if(Auth::check())
                                          @if(count($item->likes)>0)
                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}" data-like = "0"  class="like-btn likes-button">Liked</button>
                                          @else
                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}" data-like = "1" class="like-btn likes-button">Like</button>
                                          @endif
                                        @else
                                          <button data-id = "{{$item->id}}" id="likes{{$item->id}}"  class="like-btn likes-buttons">Like</button>
                                        @endif
                                        <div class="input-group">
                                        <input type="text" id="comment{{$item->id}}"class="form-control comment-field" placeholder="Write Your Comment" aria-describedby="basic-addon2">
                                          @if(Auth::check())
                                          <button class="input-group-text sub-btn do-comments" data-id="{{$item->id}}" id="basic-addon2">Submit</button>
                                          @else
                                          <button class="input-group-text sub-btn do-commentsss" data-id="{{$item->id}}" id="basic-addon2">Submit</button>
                                          @endif
                                          
                                        </div>
                                       
                                    </div>
                                
                                <div class="p-card-h">
                                    <!-- <h5 class="main-txt-card-p">{{$item->origin->title??null}}</h5> -->
                                    <a data-id="{{$item->id}}" class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >{{$item->title}}</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                   
                 @empty
                 <h3 style="color:white">No data found</h3>
                @endforelse
              @else
              
             <h3 style="color:white">No data found</h3>
             @endif
               
                

            </div>
           <style>
            .modal-backdrop.show{
                z-index:0;
            }
            </style>

            <div class="row pt-5 pb-5">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 ">
                    <div class="row">
                    @if(isset($products))
                    
                 
                        @forelse($products as $key => $item) 
                            @if($key >= 0 && $key <= 1)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                <div class="card-body-d-two">
                                    <div class="card-img">
                                        @php
                                        $html = $item->content;
                                        preg_match( '@src="([^"]+)"@' , $html, $match );
                                        $src = array_pop($match);
                                        
                                        @endphp
                                        @if(isset($src))
                                             <img class="main-d-two-img img-fluidd" src="{{$src}}"
                                                       alt="">
                                         
                                        @elseif(isset($item->type))
                                        
                                        
                                           @if($item->type == 'image') 
                                            <img class="main-d-two-img img-fluidd" src="{{$item->file??null}}"
                                               alt="">
                                            @elseif($item->type == 'video')
                                            <iframe  class="main-d-two-img img-fluidd" src="{{$item->file??null}}" ></iframe>
                                            @elseif($item->type == 'audio')
                                            <audio controls>
                                                <source src="{{$item->file??null}}" > 
                                            </audio>
                                            @else
                                            <img class="main-d-two-img img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                                            @endif
                                       
                                        @else
                                        <img class="main-d-two-img img-fluid" src="{{asset('assets/images/desk-two-img-five.png')}}" alt="">
                                        @endif    
                                                
                                       
                                    </div>
                                    <!--  -->
                                    <div class="card-ro-one">
                                        <div class="tech"> {{$item->category_name??null}}</div>
                                        <div class="TonY"><span class="tnoy-span-wit">by </span> {{$item->author_name??'admin'}}</div>
                                        <div class="dash">-</div>
                                        <div class="frinkn-date">
                                        {{date('m/d/Y', $item->published??null)}}
                                        </div>

                                    </div>
                                    <div class="card-main-t">
                                       <a data-id="{{$item->id}}" class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >{{$item->title}}</a>

                                    </div>
                                    
                                </div>
                            </div>
                            @endif

                        @empty
                        @endforelse
                    
                    @endif
                        
                    </div>
                    <!--<div class="politics-lmb">-->
                    <!--    <a class="lmp-btn" href="javascript:;">LOAD MORE POST</a>-->
                    <!--</div>-->
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 ">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="magazine_img">
                                <img src="{{asset('assets/images/img2.png')}}" class="admag-img img-fluid" alt="">
                                <h3 class="head1">ADD MAGZINE REPONSIVE NEWSPAPER AND MAGAZINE</h3>
                                <ul>
                                    <li class="admag text-center">ADS<br> <span class="admags">336 x 280</span></li>
                                    <li><a href="javascript:;">BUY NOW</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="wether-text">
                                <div class="image_div">
                                    <img src="{{asset('assets/images/cloude.png')}}" class="img-fluid" alt="">
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
<script>
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
</script>
@endsection