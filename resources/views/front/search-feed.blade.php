@extends('front/master')

@section('title')
Search Feed
@endsection
@section('body_section')
<main>

    <section class="main-Business">
        <div class="container">
            
            <div class="row pt-5 gy-4">
                
               @if(isset($search_product))
                    @forelse($search_product as $key => $item) 
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 panel ">
                        <div class="politics-card h-100">
                                    
                                    @php
                                    $html = $item->content;
                                    preg_match( '@src="([^"]+)"@' , $html, $match );
                                    $src = array_pop($match);
                                    // $dom = new DOMDocument('1.0');
                                    //$dom->loadHTML($html);
                                   // $selector = new DOMXPath($dom);
                                    
                                    //$arr = [];
                                    //foreach($selector->query('//iframe') as $iframe) {
                                      //  array_push($arr,$iframe->getAttribute('src'));
                                    //} 
                                    @endphp
                                    
                                   @if($item->type == 'image') 
                                   <img class="ploic-card-img img-fulid" src="{{$item->file}}"
                                       alt="">
                                    @elseif($item->type == 'video')
                                    
                                    <iframe  class="ploic-card-img img-fulid" src="{{$item->file}}" ></iframe>
                                    
                                    @elseif($item->type == 'audio')
                                    <audio controls>
                                        <source src="{{$item->file}}" > 
                                    </audio>
                                   
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
                                   <!--<a class="para-card main-txt-card-p" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal4{{$key}}">{{$item->title}}</a>-->
                                   <a data-id="{{$item->id}}" class="para-card mostViewd show-title-desc"   data-published = "{{$item->published}}" type="button" >{{$item->title}}</a>
                                </div>
                                
                              
                                <!--<div class="p-card-para">-->
                                <!--    <h6 class="min-para-card-p">{{$item->origin_title??null}}</h6>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>

                       
                    
                @empty
                <h3 style="align:center;color:white;">No data found</h3>
                @endforelse
             @endif
               
                

            </div>
           <style>
            .modal-backdrop.show{
                z-index:0;
            }
            </style>

           
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
@endsection