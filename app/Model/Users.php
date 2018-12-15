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


    public function saveUserInfo($request) {

        $newpassword = ($request->input('password') != '') ? $request->input('password') : null;
        $newpass = Hash::make($newpassword);
        $objUser = new Users();
        $objUser->first_name = $request->input('first_name');
        $objUser->last_name = $request->input('last_name');
        $objUser->email = $request->input('email');
        $objUser->password = $newpass;
        $objUser->created_at = date('Y-m-d H:i:s');
        $objUser->updated_at = date('Y-m-d H:i:s');
        $objUser->save();
        return TRUE;
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

   
}
