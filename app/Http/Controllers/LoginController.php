<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use App\Model\Users;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function checkAuth(Request $request) {
        
    }

    public function auth(Request $request) {
        $this->resetGuard();

//        if(Auth::guard('admin')){
//            return redirect(route('admin-dashboard'));
//        }else if(Auth::guard('customer')){
//            return redirect(route('customer-dashboard'));
//        }else if(Auth::guard('web')){
//            return redirect(route('user-dashboard'));
//        }else{
//            return view('auth.login');
//        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'role_type'=>'1'])) {
                $loginData = array(
                    'name' => Auth::guard('web')->user()->first_name,
                    'last_name' => Auth::guard('web')->user()->last_name,
                    'email' => Auth::guard('web')->user()->email,
                    'user_image' => Auth::guard('web')->user()->user_image,
                    'id' => Auth::guard('web')->user()->id
                );
                
                $objUser=new Users;
                $result=$objUser->lastlogin(Auth::guard('web')->user()->id);
                
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'User Login successfully.');
                return redirect()->route('dashboard');
            }
            
            else if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'role_type'=>'0'])) {
                $loginData = array(
                    'name' => Auth::guard('admin')->user()->first_name,
                    'last_name' => Auth::guard('admin')->user()->last_name,
                    'email' => Auth::guard('admin')->user()->email,
                    'user_image' => Auth::guard('admin')->user()->user_image,
                    'id' => Auth::guard('admin')->user()->id
                );
                $objUser=new Users;
                $result=$objUser->lastlogin(Auth::guard('admin')->user()->id);
                
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'User Login successfully.');
                return redirect()->route('admin-dashboard');
            } else {
                $request->session()->flash('session_error', 'Your username and password are wrong. Please login with correct credential...!!');
                return redirect()->route('login');
            }
        }
        return view('auth.login');
    }

    public function getLogout() {
        $this->resetGuard();
        //return Redirect::to('login'); 
        return redirect()->route('login');
    }

    public function resetGuard() {
        Session::forget('logindata');
        Session::forget('userRole');
    } 
    public function register(Request $request) {

        if ($request->isMethod('post')) {
           // print_r($request->input());exit;
            $objUser = new Users();
            $userList = $objUser->saveUserInfo($request);
            if ($userList) {
                $return['status'] = 'success';
                $return['message'] = 'User created successfully.';
                $return['redirect'] = route('login');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/user.js');
        $data['funinit'] = array('Customer.registerInit()');
        return view('auth.register', $data);
    }
    
    
    public function forgotpassword(Request $request){
        if ($request->isMethod('post')) {
//            print_r($request->input());exit;
            $objUser = new Users();
            $forgotpassword = $objUser->getinfo($request);
            if ($forgotpassword == "0" ) {
                $return['status'] = 'error';
                $return['message'] = "Email Id doesn't match.";
            }
            
            if ($forgotpassword == "1" )  {
                $return['status'] = 'success';
                $return['message'] = 'Reset Password Link Successfully sent to your email.';
                 $return['redirect'] = route('login');
            }
            
            if ($forgotpassword == "2" )  {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }

        $data['css'] = array();
        $data['pluginjs'] = array('jQuery/jquery.validate.min.js');
        $data['js'] = array('admin/user.js');
        $data['funinit'] = array('Customer.Forgotpassword()');
        return view('auth.forgotpassword', $data);
    }
        
    
}