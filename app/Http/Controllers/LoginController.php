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

            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'type' => 'USER'])) {
                $loginData = array(
                    'name' => Auth::guard('web')->user()->name,
                    'email' => Auth::guard('web')->user()->email,
                    'type' => Auth::guard('web')->user()->type,
                    'user_image' => Auth::guard('web')->user()->user_image,
                    'id' => Auth::guard('web')->user()->id
                );
                Session::push('logindata', $loginData);
                $request->session()->flash('session_success', 'User Login successfully.');
                return redirect()->route('user-dashboard');
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

}