<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AcountController extends Controller
{
    public function checklogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
     
        $user = Account::where('username', $username)
                       ->where('password',$password)->first();
        
        if ($user !== null) {
            session(['user' => $user]);
            return redirect()->route('homeadmin');
        }
    }

    public function AccountByDept_ID($id,$message){
          $account = Account::where('dept_id',$id)->get();
          return view('backend.page.account.index',compact('account','id','message'));
    }

    public function create(Request $request , $id){
           $username = $request->input('username');
           $password = $request->input('password');
           $dept_id = $request->input('dept');

           $usernameExists = $this->CheckExist($username);
           if($usernameExists){
            $error = 'Tên người dùng đã tồn tại';
            return redirect()->route('AccountByDept_ID', ['id' => $id, 'message'=>$error]);
           }else{
            $accountNew = new Account();
            $accountNew->username = $username;
            $accountNew->password = $password;
            $accountNew->dept_id = $dept_id;
            $accountNew->save();
            $success = 'Bạn đã thêm tài khoản thành công';
            return redirect()->route('AccountByDept_ID', ['id' => $id, 'message'=>$success]);
           }   
    }

    public function delete($id,$idAccount){
        $accountdelete = Account::find($idAccount);
        if($accountdelete) {
            $accountdelete->delete();
            $delete = 'Bạn đã xóa tài khoản thành công';
            return redirect()->route('AccountByDept_ID', ['id' => $id , 'message'=>$delete]);
        }
    }

    public function edit(Request $request , $id,$idAccount){
        $userName = $request->input('username');
        $existingAccount = Account::where('username', $userName)->first();
        if($existingAccount){
            $message = "Tên đăng nhập đã tồn tại";
            return redirect()->route('AccountByDept_ID', ['id' => $id , 'message'=>$message]);
        }else{
            $account = Account::find($idAccount);
            $newPassword = $request->input('password');
            $newDept_id = $request->input('dept');
            $account->username = $userName;
            $account->password = $newPassword;
            $account->dept_id = $newDept_id;
            $account->save();
            $message = "Bạn đã sửa tài khoản thành công";
            return redirect()->route('AccountByDept_ID', ['id' => $id , 'message'=>$message]);
        }

    }

    public function CheckExist($username){
         $check = Account::where('username',$username)->first();
         return $check !== null;
    }
}
