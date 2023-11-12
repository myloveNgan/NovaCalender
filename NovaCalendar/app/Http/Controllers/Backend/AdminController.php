<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AdminController extends Controller
{
    public function show(){
        if(session()->has('user')){
            return view('backend.body.employees_list');
        }else{
            return view('backend.auth.login');
        }
    }

    public function AccountByDept_ID($id){
         $data = Account::where('dept_id',$id);
         return view('backend.page.account.index')->with('data',$data);
    }

}
