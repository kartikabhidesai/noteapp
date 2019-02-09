<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use App\Model\OrderInfo;
use App\Model\Category;
use App\Model\Service;
use App\Model\Users;
use PDF;
use Config;

class Users extends Model {

    protected $table = 'users';
    
    public function getinfo($request){
//        
            $result= Users::where('email',$request->input('email'))->count();
       if($result != '1'){
           return "0";
       }else{
          $email=$request->input('email','first_name');
            $userid= Users::select("id")
                  ->where('email',$email)->get();
            $user_id = $userid[0]['id'];
            $newpassword = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzASLKJHGDMNBVCXZPOIUYTREWQ", 6)), 0, 6);
           
            $objUser = Users::find($user_id);
            $objUser->password = Hash::make($newpassword);
            $objUser->updated_at = date('Y-m-d H:i:s');
            $objUser->save();
            $mailData['subject'] = 'Forgot password';
            $mailData['attachment'] = array();
            $mailData['mailto'] = $email;
            $sendMail = new Sendmail;
            $mailData['data']['name'] = $userid[0]['first_name'];
            $mailData['data']['password'] = $newpassword;
            $mailData['template'] = 'emails.forgot-email';
            $res = $sendMail->sendSMTPMail($mailData);
            if($res){
                return "1";
            }else{
                return "2";
            }
       }
    }

    public function lastlogin($id){
         $ip = $_SERVER['REMOTE_ADDR'];
        $objUser = Users::find($id);
        $objUser->last_login = date('Y-m-d H:i:s');
        $objUser->last_login_ip = $ip;
        return $objUser->save();
    }
    
    public function updatepassword($request,$id){
         $newpass = Hash::make($request->input('newpassword'));
         
        $objUser = Users::find($id);
        $objUser->password = $newpass;
        return $objUser->save();
    }

    public function saveUserInfo($request) {
//        $objUser = new Users();
        $result = Users::where('email',$request->input('email'))->count();
        if($result != 0){
            return "0";
        }else{
        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('last_name');
        $objUser->email = $request->input('email');
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');
        if($objUser->save()){
            return "1";
        }else{
            return "2";
        }
        return TRUE;}
    }

    public function updateUserInfo($request) {
        //print_r($request->input('user_id'));
        $userId = $request->input('user_id');
        $objUser = Users::find($userId);
        $objUser->name = $request->input('first_name');
//        $objUser->type = '0';
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }

    public function getCustomerList($type) {
        return Users::select(
                                'users.id as customer_id', 'users.customer_number  as customer_number', 'order_info.company_name', 'order_info.fullname', 'users.email', 'order_info.phone', 'order_info.is_package'
                        )
                        ->leftjoin('order_info', 'users.id', '=', 'order_info.user_id')
                        ->where('users.type', '=', $type)->get();
    }
    
    public function userlist($id=null){
        if($id){
            return Users::select('id','last_login','last_login_ip','first_name','last_name','email','status','role_type')
                        ->where('id', '=',$id)->get()->toarray();
        }else{
        return Users::select('id','last_login','last_login_ip','first_name','last_name','email','status')
                        ->where('role_type', '=','1')->get()->toarray();
        }
    }   
    
    
    public function deactiveUser($id){
        $objUser = Users::find($id);
        $objUser->status = '1';
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
    
    public function activeUser($id){
        $objUser = Users::find($id);
        $objUser->status = '0';
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
    
    public function deleteuser($id){
         return Users::where('id', $id)->delete();
    }
    
    public function edituserdetails($request,$id){
        
        $objUser = Users::find($id);
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('lastname');
        $objUser->email	 = $request->input('email');
        $objUser->role_type = $request->input('role_type');
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
    }
   
    public function changepassword($request,$userdetail){
      
        $newpass = Hash::make($request->input('newpassword'));
        
        if(Hash::check($request->input('oldpassword'), $userdetail['password'])){
             $objUser = Users::find($userdetail['id']);
             $objUser->password = $newpass;
             $objUser->updated_at = date('Y-m-d H:i:s');
             if($objUser->save()){
                 return "1";
             }else{
                 return "2";
             }
        }else{
            return "0";
        }
    }
}
