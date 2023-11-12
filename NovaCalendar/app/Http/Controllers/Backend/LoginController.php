<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{

    public function checklogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
     
        $user = Login::where('username', $username)
                       ->where('password',$password)->first();
        
        if ($user !== null) {
            session(['user' => $user]);
            return redirect()->route('homeadmin');
        }
    }

    public function AcountByDepart_id($id){
          
    }
}
