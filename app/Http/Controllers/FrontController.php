<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use DOMDocument;
use DOMXPath;
use Mail;
use App\Models\Privacy;
use App\Models\Condition;
use App\Models\Cookie;
use App\Models\Subscribe;
use App\Models\About;
// use ExileeD\Inoreader\Inoreader;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use App\Models\Contact;
use Hash;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function index()
    {
            
      
            // return $cart = session()->get('likes');
        //     $curl = curl_init();
        //     curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents?n=10',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer '.$this->getToken('access_token')
        //     ),
        //     ));

        //     $response = curl_exec($curl);
        //     $data =  json_decode($response);
        //   $categories = [];
        //   if(isset($data->items))
        //   {
        //       $data = $data->items;
        //      foreach($data as $item) 
        //       {
        //              $html = $item->summary->content??null;
        //              preg_match( '@src="([^"]+)"@' , $html, $match );
        //              $src = array_pop($match);
        //              if(isset($src))
        //             {
        //               $input['type'] = 'image';
        //               $input['file'] = $src; 
        //             }
        //             elseif(isset($item->enclosure)){
        //               $input['type'] = substr($item->enclosure[0]->type??null,0,5);
        //               $input['file'] =$item->enclosure[0]->href;
        //              }
        //               $input['streamId'] = $item->origin->streamId??null;
        //               $input['htmlUrl'] = $item->origin->htmlUrl??null;
        //               $input['category_name'] = substr($item->categories[2]??null, 22);
        //               $input['author_name'] = $item->author??'admin';
        //               $input['published'] = $item->published??null;
        //               $input['title'] = $item->title??null;
        //               $input['origin_title'] = $item->origin->title??null;
        //               $input['content'] = $item->summary->content??null;
                      
        //              $check = Product::where('published',$item->published)->first();
                 
        //             if($check)
        //             {
        //                 Product::where('published',$item->published)->update($input);  
        //             }else{
                        
        //               Product::create($input); 
                        
        //             }
        //       }


        //   }else{
        //      $data = [];
        //   }
           
           
           
           
        //     $curl1 = curl_init();
        //   curl_setopt_array($curl1, array(
        //   CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents?n=4',
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => '',
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 0,
        //   CURLOPT_FOLLOWLOCATION => true,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => 'POST',
        //   CURLOPT_HTTPHEADER => array(
        //       'Authorization: Bearer '.$this->getToken('access_token')
        //   ),
        //   ));

        //   $response1 = curl_exec($curl1);
        //   $four_data =  json_decode($response1);
        
        
           $four_data_from_db = Product::inRandomOrder()->OrderBy('id','DESC')->take(4)->where('type','video')->Orwhere('type','image')->get();
           $product = Product::inRandomOrder()->OrderBy('id','DESC')->take(5)->where('type','video')->Orwhere('type','image')->get();
           
           $latest_article = Product::with('likes')->OrderBy('id','DESC')->take(10)->inRandomOrder()->where('type','video')->Orwhere('type','image')->get();
           
           $latest_views = Product::take(6)->where('type','video')->OrderBy('id','DESC')->Orwhere('type','image')->get();
           
           $recent_product = Product::take(6)->where('type','video')->OrderBy('id','DESC')->Orwhere('type','image')->get();
           $comments_product = Product::inRandomOrder()->take(6)->where('type','video')->OrderBy('id','DESC')->Orwhere('type','image')->get();
           
           $lifeStyle = Product::inRandomOrder()->where('streamId','feed/http://www.rollingstone.com/music/rss')->take(6)->get();
           $twoProduct = Product::inRandomOrder()->OrderBy('view','DESC')->take(2)->get();
           // $popular_product = Product::inRandomOrder()->take(7)->get();
        //   House Design Start//
          
            // $house_design = curl_init();
            // curl_setopt_array($house_design, array(
            // CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents/feed/http://www.businessoffashion.com/feed?n=4',
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 0,
            // CURLOPT_FOLLOWLOCATION => true,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => 'POST',
            // CURLOPT_HTTPHEADER => array(
            //     'Authorization: Bearer '.$this->getToken('access_token')
            // ),
            // ));

            // $house_design_response = curl_exec($house_design);
            // $house_design_response =  json_decode($house_design_response);
            
        // House Design end //
        
        // Start Category with Sub Category //
          $categories = Category::with('subCategory')->get();
          
        // End Category with subcategory //
           return view('front/index',compact('twoProduct','product','latest_article','categories','latest_views','recent_product','lifeStyle','four_data_from_db','comments_product'));
    }

    public function streamDetail($id)
    {
           $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->getToken('access_token')
            ),
            ));

            $response = curl_exec($curl);
           return  $data =  json_decode($response);
            
           
    }

    public function myfeed($id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$this->getToken('access_token')
        ),
        ));

        $response = curl_exec($curl);
        $data =  json_decode($response);
        
        
        $input = [];
            if(isset($data))
            {
              foreach($data->items as $item) 
              {
                    $html = $item->summary->content??null;
                     preg_match( '@src="([^"]+)"@' , $html, $match );
                     $src = array_pop($match);
                    if(isset($src))
                    {
                       $input['type'] = 'image';
                       $input['file'] = $src; 
                    }
                    elseif(isset($item->enclosure)){
                      $input['type'] = substr($item->enclosure[0]->type??null,0,5);
                      $input['file'] =$item->enclosure[0]->href;
                     }
                     $input['streamId'] = $item->origin->streamId??null;
                      $input['htmlUrl'] = $item->origin->htmlUrl??null;
                      $input['category_name'] = substr($item->categories[2]??null, 22);
                      $input['author_name'] = $item->author??'admin';
                      $input['published'] = $item->published??null;
                      $input['title'] = $item->title??null;
                      $input['origin_title'] = $item->origin->title??null;
                      $input['content'] = $item->summary->content??null;
                      
                      $check = Product::where('published',$item->published)->first();
                 
                    if($check)
                    {
                        Product::where('published',$item->published)->update($input);  
                    }else{
                        
                       Product::create($input); 
                        
                    }
                
                }
                
              }
              
        $products =  Product::where('streamId',$id)->OrderBy('created_at','DESC')->take(15)->get();      
           
        return view('front/feed-detail',compact('data','products'));
    }

    public function myfeedByCategory(Request $request)
    {
      // return $request->url;
      $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents/'.$request->url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$this->getToken('access_token')
        ),
        ));

        $response = curl_exec($curl);
        return $data =  json_decode($response);
       
       
       
    }
    
    public function clickbyvideo(Request $request)
    {
        // return $request->all();
        return Product::where('id',$request->id)->first();
    }
    
    public function searchCategory(Request $request)
    {
       $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/subscription/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->getToken('access_token')
            ),
            ));
           
            $subscription_list = curl_exec($curl);
            $subscription_list  =  json_decode($subscription_list);
            
            $list = [];
            $title = [];
            foreach($subscription_list->subscriptions as $key => $item)
            {
                
                   if($item->categories[0]->label == $request->category)
                   {
                        array_push($list,$item->id);
                        array_push($title,$item->title);
                        $category = Category::where('category_name',$request->category)->first();
                        $checkFeed =  SubCategory::where('feed',$item->id)->first();
                        if($checkFeed)
                       {
                           SubCategory::where('feed',$item->id)->update(['category_id'=>$category->id,'feed'=>$item->id,'title'=>$item->title]); 
                       }else{
                           
                          SubCategory::Create(['category_id'=>$category->id,'feed'=>$item->id,'title'=>$item->title]);
                       }
                   }
                   
            }
            return ['title'=>$title,'feed'=>$list];
    }
    
    public function  houseDesign()
    {
        // https://www.inoreader.com/reader/api/0/stream/contents/feed/http://feeds.feedburner.com/cyanatrendland
    }


    public function getToken()
    {
      $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.inoreader.com/oauth2/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('client_id' => '1000003976','client_secret' => 'QFPtItZ1QBeSD4wSHWIbNodahObFy3w8','grant_type' => 'refresh_token','refresh_token' => '05269219f1e89cf4c050d739367248ccf52a06cc'),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      $token = json_decode($response);
      if(isset($token->access_token))
      {
        return $token->access_token;
          
      }
    }
    
    public function searchFeed(Request $request)
    {
       $search_product =  Product::where('title', 'like', '%' . $request->search . '%')
       ->Orwhere('author_name', 'like', '%' . $request->search . '%')
       ->Orwhere('origin_title', 'like', '%' . $request->search . '%')->take(10)
       ->get();
       return view('front.search-feed',compact('search_product'));
    }
    
    public function myfeedByCategoryDatabase(Request $request)
    {
           return $categories = Product::latest('id')->where('streamId',$request->url)->take(10)->where('type','!=',null)->get();
    }
    
    
    public function subscribe(Request $request)
    {
        $data = ['email' => $request->email];
        $email = $request->email;
        $send = Mail::send("mail", $data, function($message) use($email) {

        $message->to('robertsonalexander40@gmail.com')->subject('Subscribe email');

        $message->from($email,'SZ john');
        });
        if($send)
        {
            return redirect()->back();
        }else{
            return redirect()->back();
        //    return ['message'=>'error']; 
        }
    }
    
    public function addView(Request $request)
    {
        return $categories = Product::where('published',$request->id)->increment('view',1);
    }
    
    public function showTitleDesc(Request $request)
    {
       return Product::with('likes')->find($request->id); 
    }
    
    public function doComments(Request $request)
    {
       
       $input = $request->all();
       $input['user_id'] = auth()->user()->id;
       $comment = Comment::create($input);
       if($comment)
       {
           return array('message'=>'Thank you for your feedback','type'=>'success');
       }else{
          return array('message'=>'Something went wrong please try again','type'=>'error'); 
       }
    }
    
    public function doLikes(Request $request)
    {
        
        $find = Like::where('product_id',$request->product_id)->where('user_id',auth()->user()->id)->first();
        if($find)
        {
            Like::where('product_id',$request->product_id)->delete();
            return array("success"=>0);
        }else{
            
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            $comment = Like::create($input);
            
            return array("success"=>1);
        }
        
    
    }
    
    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function subscribe1(Request $request)
    {
        $data = ['email' => $request->email];
        Subscribe::create($data);
        $email = $request->email;
        $send = Mail::send("mail", $data, function($message) use($email) {

        $message->to('robertsonalexander40@gmail.com')->subject('Verify your email for Dream way');

        $message->from($email,'Social Alchemy');
        });
        if($send)
        {
            return redirect()->back()->with(['message'=>'Your query has been send','type'=>'success']);
        }else{
          return redirect()->back()->with(['message'=>'Something went wrong please try again','type'=>'error']); 
        }
    }
    
    
    
    public function privacyPolicy()
    {
        $data =  Privacy::first();
        return view('front/privacy-policy',compact('data'));
    }
    
    
    public function cookiePolicy()
    {
         $data =  Cookie::first();
        return view('front/cookie-policy',compact('data'));
    }
    
    public function termsConditions()
    {
        $data =  Condition::first();
        return view('front/terms-conditions',compact('data'));
    }
    
    public function About()
    {
        $data = About::first();
        return view('front/about',compact('data'));
    }
    
    
    public function register()
    {
        return view('front/register');
    }
    
    public function userLogin()
    {
        return view('front/login');
    }
    
    
    
    public function registerProcess(Request $requset)
    {
        $validated = $requset->validate([
        'email' => 'required|unique:users',
        'password' => 'required',
        'name' => 'required',
        ]);
        
        $input = $requset->except(['password','_token'],$requset->all());
        $input['password'] = Hash::make($requset->password);
        
        $add = User::Create($input);
        if($add)
        {
          return redirect()->back()->with(['message'=>'Register successfully','type'=>'success']);    
        }else{
           return redirect()->back()->with(['message'=>'Error! Something went wrong please try again','type'=>'error']);  
        }
        
    }
    
    
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::attempt($credentials)) {
            return redirect('/');
        }else{
           return redirect()->back()->with(['message'=>'Email or Password invalid','type'=>'error']);  
        }
    }
    
    
    public function contactUs()
    {
        return view('front.contact-us');
    }
    
    public function AddContactUs(Request $request)
    {
        $input = $request->all();
        $add = Contact::create($input);
         if($add)
        {
          return redirect()->back()->with(['message'=>'Thank you','type'=>'success']);    
        }else{
           return redirect()->back()->with(['message'=>'Error! Something went wrong please try again','type'=>'error']);  
        }
        
    }


    
    
    
    
    
    
    
}
