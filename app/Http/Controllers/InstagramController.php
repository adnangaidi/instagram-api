<?php

namespace App\Http\Controllers;


use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

// use App\Model\compteMedia;

class InstagramController extends Controller
{


    public function redirectToInstagram()
    {
        // $instagramAuthUrl = Socialite::driver('instagram')->redirect()->getTargetUrl();
        return Socialite::driver('instagrambasic')->redirect();
    }

    public function handleInstagramCallback()
    {
        $user = Socialite::driver('instagrambasic')->user();
        // $accesstoken= (string)$user->token;
// $newImagepath=time().'-'.$user->id.'.'.$user->profile_pic_url->extension();
// $user->getAvatar->move(public_path('images'),$newImagepath);        
DB::table('compte_media')->updateOrInsert([
            'access_token' => $user->token,
            'type_compte' => 'instagram',
            'image_path'=> $user->getEmail()
        ]);


        return redirect('/home');
    }
}
