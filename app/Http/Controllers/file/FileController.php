<?php

namespace App\Http\Controllers\file;
use App\Http\Controllers\Controller;

class FileController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('file/file.js');
        $data['funinit'] = array('File.Init()');

        return view('file.index', $data);
    }
    
}