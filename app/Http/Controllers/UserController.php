<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module\Secret;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //
    public function index(){
        $is_auth = false;

        // if($request->session()->get('token_data')){
        //     $is_auth = true;
        // }
    
        return view('welcome', compact('is_auth'));
    }

    public function transit(){

        $url = url()->full();
        
        
        try{
            $url_exploder = explode('acc=', $url);

            $token_access = end($url_exploder);
            
            $secret = new Secret();
            $decrypt_ta = $secret->token_decryption($token_access);

    
            $token_matcher = DB::table('sessions')->select('token_refresh', 'token_csrf', 'expires_at')->where('token_access', $decrypt_ta)->first();
        
            
            if(!$token_matcher){
                return redirect()->back();
            } 
    
            $decrypt_tr = $secret->token_encryption($token_matcher->token_refresh);
            $decrypt_tc = $secret->token_encryption($token_matcher->token_csrf);
    
            $token_data = [
                'access' => $token_access,
                'refresh' => $decrypt_tr,
                'csrf' => $decrypt_tc
            ];
            return view('authen.transit', compact('token_data'));

        } catch(\Exception $e){
            return redirect()->back();
        }
       
    }
   
}
