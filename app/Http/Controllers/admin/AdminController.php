<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Setting;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\Privacy;
use App\Models\Condition;
use App\Models\Cookie;
use App\Models\About;
use Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
      return view('admin.dashboard');
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
          $data = User::latest()->where('id','!=',auth()->user()->id)->get();
          return Datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action', function($row){
                  $actionBtn = '<a href="javascript:void(0)" data-toggle="modal"  data-target="#modal-default" class="update_user btn btn-success btn-sm"  data-id='.$row->id.'>Update</a>  <a href="javascript:void(0)" data-id='.$row->id.' class="delete-record btn btn-danger btn-sm">Delete</a>';
                  return $actionBtn;
              })
              ->rawColumns(['action'])
              ->make(true);
       }
    }

    public function view_user(Request $request)
    {
       $data = User::latest()->get();
        return view('admin.view-user',compact('data'));
    }

    public function settings()
    {
      $settings = Setting::first();
      return view('admin.setting',compact('settings'));
    }

    public function addSettings(Request $request)
    {
      $input  = $request->except(['_token', 'logo','footer_logo','id'],$request->all());
      if($request->hasFile('logo'))
       {
           $img = Str::random(17).$request->file('logo')->getClientOriginalName();
           $input['logo'] = $img;
           $request->logo->move(public_path("documents/setting/"), $img);
       }

       if($request->hasFile('footer_logo'))
       {
           $img = Str::random(17).$request->file('footer_logo')->getClientOriginalName();
           $input['footer_logo'] = $img;
           $request->footer_logo->move(public_path("documents/setting/"), $img);
       }


        $setting = Setting::updateOrCreate(['id'   => $request->id],$input);
        if($setting)
        {
          return redirect()->back()->with(['message'=>'Updated','type'=>'success']);
        }else{
          return redirect()->back()->with(['message'=>'Error! Please try again','type'=>'error']);
        }
    }


    public function viewCategory()
    {
        $category = Category::all();
        return view('admin.view-category',compact('category'));
    }

    public function subCategory($id)
    {
       $sub_category = SubCategory::where('category_id',$id)->get();
        return view('admin.view-sub-category',compact('sub_category'));
    }

    public function allNews()
    {
        $products = Product::all();
        return view('admin.view-news',compact('products'));
    }

    public function subscribe1(Request $request)
    {
        $data = ['email' => $request->email];
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
        $policy = Privacy::first();
        return view('admin.privacy-policy',compact('policy'));
    }
    
    
    public function cookiePolicy()
    {
        $policy = Cookie::first();
        return view('admin.cookie-policy',compact('policy'));
    }
    
    public function termsCondition()
    {
        $policy = Condition::first();
        return view('admin.terms-conditions',compact('policy'));
    }
    
    
    public function AboutUs()
    {
        $data = About::first();
        return view('admin.about-us',compact('data'));
    }
    
    public function AddAboutUs(Request $request)
    {
      $data =  ['text'=>$request->text,'title'=>$request->title]; 
      if($request->hasFile('image'))
        {
            $img = Str::random(20).$request->file('image')->getClientOriginalName();
            $data['image'] = $img;
            $request->image->move(public_path("documents/image"), $img);
        }
        //$add = About::create($data);
       $add = About::updateOrCreate(['id'=>$request->id],$data);
        if($add)
        {
            return redirect()->back()->with(['message'=>'Updated Successfully','type'=>'success']);
        }else{
          return redirect()->back()->with(['message'=>'Something went wrong please try again','type'=>'error']); 
        }
        
        
    }
    
    
    
    public function addPolicy(Request $request)
    {
    
       if($request->type == 'policy')
        {
              $add = Privacy::updateOrCreate(['id'=>$request->id],['text'=>$request->text]);
        }
        
        if($request->type == 'terms')
        {
              $add = Condition::updateOrCreate(['id'=>$request->id],['text'=>$request->text]);
        }
        
        if($request->type == 'cookie')
        {
              $add = Cookie::updateOrCreate(['id'=>$request->id],['text'=>$request->text]);
        }
        
       //$add = Privacy::updateOrCreate(['id'=>$request->id],['text'=>$request->text]);
       return redirect()->back()->with(['message'=>'Updated','type'=>'success']);
    }


}
