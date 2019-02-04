<?php

namespace App\Http\Controllers\file;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Response;
use App\Model\Files;

class FileController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['detail'] = $this->loginUser;
        $objFileList= new Files();
        $data['filelist']= $objFileList->userfilelist($data['detail']['id']);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('file/file.js');
        $data['funinit'] = array('File.Init()');

        return view('file.index', $data);
    }
    
    
    public function addfile(Request $request) {
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
            
          $objAddFile = new Files();
          $addFile = $objAddFile->addFile($request,$data['detail']['id']);
            if ($addFile) {
                $return['status'] = 'success';
                $return['message'] = 'File uploaded successfully.';
                $return['redirect'] = route('file');
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
        $data['js'] = array('file/file.js');
        $data['funinit'] = array('File.Add()');

        return view('file.addfile', $data);
    }
    
    public function editfile(Request $request,$id=NULL) {
        if ($request->isMethod('post')) {
            
          $objAddFile = new Files();
          $addFile = $objAddFile->editFile($request);
            if ($addFile) {
                $return['status'] = 'success';
                $return['message'] = 'File uploaded successfully.';
                $return['redirect'] = route('file');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $objFileList= new Files();
        $data['filedetails']= $objFileList->filelist($id);
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('file/file.js');
        $data['funinit'] = array('File.Edit()');

        return view('file.editfile', $data);
    }
    
    
    
    public function downloadfile($file) {
        $filepath=  base_path().'/public/uploads/file/'.$file;
        return Response::download($filepath);
    }
    
   

    public function deletefile(Request $request) {
        if ($request->isMethod('post')) {
            $objFileDelete= new Files();
            $FileDelete= $objFileDelete->fileDelete($request);
            if ($FileDelete) {
                $return['status'] = 'success';
                $return['message'] = 'File delete successfully.';
                $return['redirect'] = route('file');
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
    
    
}