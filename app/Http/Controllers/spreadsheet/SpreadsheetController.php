<?php

namespace App\Http\Controllers\spreadsheet;
use App\Http\Controllers\Controller;
use App\Model\Spreadsheet;
use Illuminate\Http\Request;

class SpreadsheetController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function spreadsheetlist(){
        $data['detail'] = $this->loginUser;
        $objSheetList= new Spreadsheet();
        $data['sheetlist']= $objSheetList->usersheetlist($data['detail']['id']);
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('spreadsheet/spreadsheet.js');
        $data['funinit'] = array('Spreadsheet.Init()');

        return view('spreadsheet.spreadsheetlist', $data);
    }
    
    public function spreadsheetlistadd(){
        $data['detail'] = $this->loginUser;
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('spreadsheet/css/jquery.jexcel.css');
        $data['js'] = array('spreadsheet/spreadsheet.js','spreadsheet/js/jquery.csv.min.js','spreadsheet/js/jquery.jexcel.js');
        $data['funinit'] = array('Spreadsheet.Add()');

        return view('spreadsheet.spreadsheetadd', $data);
    }
    
    public function ajaxcall(Request $request){
        $data['detail'] = $this->loginUser;
        $objSheetAdd= new Spreadsheet();
        $addSheet= $objSheetAdd->usersheetadd($request,$data['detail']['id']);
        
        if ($addSheet) {
                $return['status'] = 'success';
                $return['message'] = 'Sheet created successfully.';
                $return['redirect'] = route('spreadsheet');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
    }
    
    public function spreadsheetlistedit($id){
        $data['detail'] = $this->loginUser;
        $objSheetAdd= new Spreadsheet();
        $data['sheetdata']= $objSheetAdd->usersheetedit($id);
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('spreadsheet/css/jquery.jexcel.css');
        $data['js'] = array('spreadsheet/spreadsheet.js','spreadsheet/js/jquery.csv.min.js','spreadsheet/js/jquery.jexcel.js');
        $data['funinit'] = array('Spreadsheet.Edit()');

        return view('spreadsheet.spreadsheetedit', $data);
    }
    
    public function ajaxcalledit(Request $request){
        $data['detail'] = $this->loginUser;
        $objSheetAdd= new Spreadsheet();
        $addSheet= $objSheetAdd->sheetEdit($request,$data['detail']['id']);
        
        if ($addSheet) {
                $return['status'] = 'success';
                $return['message'] = 'Sheet created successfully.';
                $return['redirect'] = route('spreadsheet');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
    }
    
    
    public function spreadsheetlistview($id){
         $data['detail'] = $this->loginUser;
        $objSheetAdd= new Spreadsheet();
        $data['sheetdata']= $objSheetAdd->usersheetedit($id);
        
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('spreadsheet/css/jquery.jexcel.css');
        $data['js'] = array('spreadsheet/spreadsheet.js','spreadsheet/js/jquery.csv.min.js','spreadsheet/js/jquery.jexcel.js');
        $data['funinit'] = array('Spreadsheet.Edit()');

        return view('spreadsheet.spreadsheetview', $data);
    }
    
    public function deletesheet(Request $request){
        if ($request->isMethod('post')) {
             $objSheetAdd= new Spreadsheet();
            $SheetDelete= $objSheetAdd->sheetDelete($request);
            if ($SheetDelete) {
                $return['status'] = 'success';
                $return['message'] = 'Sheet delete successfully.';
                $return['redirect'] = route('spreadsheet');
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