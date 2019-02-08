<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Model\Users;
use Auth;

class UserController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $objFileList= new Users();
        $data['userlist']= $objFileList->userlist();
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/userlist.js');
        $data['funinit'] = array('Userlist.Init()');

        return view('admin.index', $data);
    }
    
    public function dashborad(){
        $data['detail'] = $this->loginUser; 
        return view('admin.dashboard', $data);
    }
    
    public function ajaxAction(Request $request) {
        
        if ($request->isMethod('post')) {
            
            $action=$request->input('action');
          
            switch ($action) {
                
                case 'deactiveUser' :
                  $objFileList= new Users();
                  $deactiveUser= $objFileList->deactiveUser($request->input('id'));   
                    if ($deactiveUser) {
                      $return['status'] = 'success';
                      $return['message'] = 'User  deactived successfully.';
                      $return['redirect'] = route('userlist');
                  } else {
                      $return['status'] = 'error';
                      $return['message'] = 'something will be wrong.';
                  }
                  echo json_encode($return);
                  exit;
                break;
                
                case 'activeUser' :
                  $objFileList= new Users();
                  $activeUser= $objFileList->activeUser($request->input('id')); 
                  if ($activeUser) {
                      $return['status'] = 'success';
                      $return['message'] = 'User  actived successfully.';
                      $return['redirect'] = route('userlist');
                  } else {
                      $return['status'] = 'error';
                      $return['message'] = 'something will be wrong.';
                  }
                  echo json_encode($return);
                  exit;
                break;
                
                case 'deleteuser' :
                    
                   $objFileList= new Users();
                  $activeUser= $objFileList->deleteuser($request->input('id')); 
                  if ($activeUser) {
                      $return['status'] = 'success';
                      $return['message'] = 'User  Deleted successfully.';
                      $return['redirect'] = route('userlist');
                  } else {
                      $return['status'] = 'error';
                      $return['message'] = 'something will be wrong.';
                  }
                  echo json_encode($return);
                  exit; 
            }
        }
    }
    public function viewuser($id){
        $objFileList= new Users();
        $data['userlist']= $objFileList->userlist($id);
        return view('admin.userview',$data);
    }
    public function edituser(Request $request,$id){
        $objUserlist= new Users();
        $data['userlist']= $objUserlist->userlist($id);
        if ($request->isMethod('post')) {
           
          $objUserlist= new Users();
          $addFile = $objUserlist->edituserdetails($request,$id);
            if ($addFile) {
                $return['status'] = 'success';
                $return['message'] = 'User Details  updated successfully.';
                $return['redirect'] = route('userlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/userlist.js');
        $data['funinit'] = array('Userlist.Edit()');
        return view('admin.editview',$data);
    }
    public function changepassword(Request $request,$id){

        
        $data['userid']=$id;
        if ($request->isMethod('post')) {
            
          $objUserlist= new Users();
          $updatepassword = $objUserlist->updatepassword($request,$id);
            if ($updatepassword) {
                $return['status'] = 'success';
                $return['message'] = 'User Details  updated successfully.';
                $return['redirect'] = route('userlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('admin/userlist.js');
        $data['funinit'] = array('Userlist.Changepassword()');
        return view('admin.chnagepassword',$data);
    }
    
    public function adminchangepassword(Request $request){
         $data['detail'] = $this->loginUser;
       
        if ($request->isMethod('post')) {
          $objuser = new Users();
          
          $changepassword = $objuser->changepassword($request,$data['detail']);
            if ($changepassword=='1') {
                $return['status'] = 'success';
                $return['message'] = 'Your password changed.';
                $return['redirect'] = route('admin-dashboard');
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

        return view('admin.profile.changepassowrd', $data);
    }
}?>