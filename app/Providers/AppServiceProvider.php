<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\FrontControler;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //   $token =  app('App\Http\Controllers\FrontController')->getToken();
           
        //   $curltag = curl_init();
        //     curl_setopt_array($curltag, array(
        //     CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/tag/list',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer '.$token
        //     ),
        //     ));
           
        //     $tag_list = curl_exec($curltag);
        //     $tag_list  =  json_decode($tag_list);
           
           
        //   $curl = curl_init();
        //     curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/subscription/list',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer '.$token
        //     ),
        //     ));
           
        //     $subscription_list = curl_exec($curl);
        //     $subscription_list  =  json_decode($subscription_list);
           

            $category = [];
            $covid = [];
            $feed = [];
        //     if($subscription_list !=null)
        //     {
        //         foreach($subscription_list->subscriptions as $key => $item)
        //         {
                    
        //                 array_push($category,$item->categories[0]->label);
        //                 array_push($feed,$item->id);
        //                  $check = Category::where('category_name',$item->categories[0]->label)->first();
                 
        //                 if($check)
        //                 {
        //                     Category::where('category_name',$item->categories[0]->label)->update(['category_name'=>$item->categories[0]->label,'feed'=>$item->id]);  
        //                 }else{
                            
        //                   Category::create(['category_name'=>$item->categories[0]->label,'feed'=>$item->id]);
                            
        //                 }
                        
                       
        //               $sort_id =  Category::where('category_name',$item->categories[0]->label)->first();
        //               if($sort_id)
        //               {
        //                     if($check->category_name == $item->categories[0]->label)
        //                       {
        //                           $checkSub = SubCategory::where('feed',$item->id)->first();
        //                           if($checkSub)
        //                           {
        //                               SubCategory::where('feed',$item->id)->update(['category_id'=>$sort_id->id,'title'=>$item->title,'feed'=>$item->id,'sortid'=>$item->sortid]); 
        //                           }else{
        //                               SubCategory::create(['category_id'=>$sort_id->id,'title'=>$item->title,'feed'=>$item->id,'sortid'=>$item->sortid]); 

        //                           }
                                   
        //                       }
        //               }
        //          }
               
        //         $cat = array_merge($category,$covid);
        //         $myCategories = array_unique($cat);
        //         $data_limit = 0;
               
        //     }else{
        //         $cat = [];
        //         $myCategories = [];
        //         $data_limit = 1;
        //     }
            
             $data_limit = 1;
            
            //  Recent Post
            // $curlrecentpost = curl_init();
            // curl_setopt_array($curlrecentpost, array(
            // CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents?n=3',
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 0,
            // CURLOPT_FOLLOWLOCATION => true,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => 'POST',
            // CURLOPT_HTTPHEADER => array(
            //     'Authorization: Bearer '.$token
            // ),
            // ));

            // $response_recent = curl_exec($curlrecentpost);
            // $recent_post =  json_decode($response_recent);
            
            $popular_product = Product::inRandomOrder()->take(7)->get();
            $categories = Category::with('subCategory')->get();
            $recent_post = Product::inRandomOrder()->OrderBy('created_at','DESC')->take(3)->where('type','image')->get();
        
           
           
             View::share(compact('data_limit','feed','recent_post','categories','popular_product'));
    }
}
