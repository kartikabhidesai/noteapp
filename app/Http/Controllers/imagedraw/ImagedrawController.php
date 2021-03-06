<?php

namespace App\Http\Controllers\imagedraw;
use App\Http\Controllers\Controller;
use App\Model\Draw;
use Illuminate\Http\Request;

class ImagedrawController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function imagedrawlist() {
        $data['detail'] = $this->loginUser;
        $objFileList= new Draw();
        $data['filelist']= $objFileList->userfilelist($data['detail']['id']);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('imagedraw/imagedraw.js');
        $data['funinit'] = array('Imagedraw.Init()');

        return view('imagedraw.imagedrawlist', $data);
    }
    public function imagedrawadd() {
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('imagedraw/painterro.min.js','imagedraw/imagedraw.js');
        $data['funinit'] = array('Imagedraw.Add()');

        return view('imagedraw.imagedrawadd', $data);
    }
    public function savedrawimage(Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            
          $objAddFile = new Draw();
          $addFile = $objAddFile->addDraw($request,$data['detail']['id']);
            if ($addFile) {
                $return['status'] = 'success';
                $return['message'] = 'Drawing saved successfully.';
                $return['redirect'] = route('imagedrawlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
//        return view('imagedraw.imagedrawadd', $data);
    }
    
    public function editDrawImage(Request $request){
       $data['detail'] = $this->loginUser; 
       if ($request->isMethod('post')) {
            
          $objAddFile = new Draw();
          $addFile = $objAddFile->editDraw($request);
            if ($addFile) {
                $return['status'] = 'success';
                $return['message'] = 'Drawing saved successfully.';
                $return['redirect'] = route('imagedrawlist');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
    }

    public function deletedrawimage(Request $request) {
        if ($request->isMethod('post')) {
            $objFileDelete= new Draw();
            $FileDelete= $objFileDelete->fileDelete($request);
            if ($FileDelete) {
                $return['status'] = 'success';
                $return['message'] = 'Drawing delete successfully.';
                $return['redirect'] = route('imagedrawlist');
                echo json_encode($return);
                exit;
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Something went wrong.';
                echo json_encode($return);
                exit;
            }
        }
    }
    
    public function editimage($id){
        $objfileEDit= new Draw();
        $data['fileEDit'] = $objfileEDit->fileEDit($id);
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('imagedraw/painterro.min.js','imagedraw/imagedraw.js');
        $data['funinit'] = array('Imagedraw.Edit()');

        return view('imagedraw.imagedrawedit', $data);
    }
}