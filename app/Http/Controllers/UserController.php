<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module\Secret;

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
        
        $url_exploder = explode('acc=', $url);

        $get_token_access = end($url_exploder);
        
        $secret = new Secret();
        $decrypt_ta = $secret->token_decryption($get_token_access);
        dd($decrypt_ta);
        return view('authen.transit');
    }
   
}
