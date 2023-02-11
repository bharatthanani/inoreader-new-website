<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ApiCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Apirun:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // User::create(['name'=>'Bharat','email'=>'bharat@gmail.com','password'=>123]);
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
      
    //   if(isset($token->access_token))
    //   {
    //     return $token->access_token;
          
    //   }
    //   User::create(['name'=>'Bharat','email'=>'bhara@gmail.com','password'=>123,'remember_token'=>$token->access_token]);
      if(isset($token->access_token))
      {
           $curltag = curl_init();
            curl_setopt_array($curltag, array(
            CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/tag/list',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token->access_token
            ),
            ));
           
            $tag_list = curl_exec($curltag);
            $tag_list  =  json_decode($tag_list);
            
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
                'Authorization: Bearer '.$token->access_token
            ),
            ));
           
            $subscription_list = curl_exec($curl);
            $subscription_list  =  json_decode($subscription_list);
           

            $category = [];
            $covid = [];
            $feed = [];
            if($subscription_list !=null)
            {
                foreach($subscription_list->subscriptions as $key => $item)
                {
                    
                        array_push($category,$item->categories[0]->label);
                        array_push($feed,$item->id);
                         $check = Category::where('category_name',$item->categories[0]->label)->first();
                 
                        if($check)
                        {
                           Category::where('category_name',$item->categories[0]->label)->update(['category_name'=>$item->categories[0]->label,'feed'=>$item->id]);  
                        }else{
                           Category::create(['category_name'=>$item->categories[0]->label,'feed'=>$item->id]);
                        }
                        
                       
                       $sort_id =  Category::where('category_name',$item->categories[0]->label)->first();
                       if($sort_id)
                       {
                            if($check->category_name == $item->categories[0]->label)
                               {
                                   $checkSub = SubCategory::where('feed',$item->id)->first();
                                   if($checkSub)
                                   {
                                       SubCategory::where('feed',$item->id)->update(['category_id'=>$sort_id->id,'title'=>$item->title,'feed'=>$item->id,'sortid'=>$item->sortid]); 
                                   }else{
                                      SubCategory::create(['category_id'=>$sort_id->id,'title'=>$item->title,'feed'=>$item->id,'sortid'=>$item->sortid]); 
                                    }
                               }
                       }
                 }
               
                $cat = array_merge($category,$covid);
                $myCategories = array_unique($cat);
                $data_limit = 0;
               
            }
            
            
            // Add Product Database //
            
            
                $curlProduct = curl_init();
                curl_setopt_array($curlProduct, array(
                CURLOPT_URL => 'https://www.inoreader.com/reader/api/0/stream/contents',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$token->access_token
                ),
                ));
    
                $responseProduct = curl_exec($curlProduct);
                $dataProduct =  json_decode($responseProduct);
               $categories = [];
               if(isset($dataProduct->items))
               {
                   $data = $dataProduct->items;
                 foreach($data as $item) 
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
       }
      
    }
}
