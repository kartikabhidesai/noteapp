<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Users;
class UserController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function dashboard() {
        $data['detail'] = $this->loginUser;
        return view('user.dashboard', $data);
    }
     public function changepassword(Request $request){
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            
          $objuser = new Users();
          $changepassword = $objuser->changepassword($request,$data['detail']);
            if ($changepassword=='1') {
                $return['status'] = 'success';
                $return['message'] = 'Your password changed.';
                $return['redirect'] = route('dashboard');
            }
            if ($changepassword=='2') {
                $return['status'] = 'error';
                $return['message'] = 'Something goes to wronge.';
            }
            if ($changepassword=='0') {
                $return['status'] = 'error';
                $return['message'] = 'Your old password not match.';
            } 
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('profile/changepassword.js');
        $data['funinit'] = array('Changepassword.Init()');

        return view('profile.changepassowrd', $data);
    }
    
}