<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ReelController extends Controller
{
    public function index()
    {
        // get Access token stored in the database
        $accessToken=DB::table('compte_media')->where('id', 3)->value('access_token');
        
        // Make a request to Instagram's API to fetch reels data  
        $response = Http::get("https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink&access_token=$accessToken");
        $reels = $response->json();
        // if(isset($reels['data'])) {
        //     foreach($reels['data'] as $reel){
        //         if($reel['media_type']=='vidio'){
        //             $res=[
        //                 [
        //                     'id'=>$reel['id'],
        //                     'media_url'=>$reel['media_url'],
        //                     'caption'=>$reel['caption']
        //                 ]
        //                 ]; 
        //         }
        //     }
        // }
        // $media=$res->json();
        dd($reels);
        return view('reels.index', compact('reels'));
    }
    public function showcomptes(){
        $comptes=DB::table('compte_media')->get();
        //DB::table('compte_media');
        return response()->json($comptes);
    }
}

