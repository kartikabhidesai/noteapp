<?php

namespace App\Http\Controllers\imagedraw;
use App\Http\Controllers\Controller;

class ImagedrawController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('imagedraw/imagedraw.js');
        $data['funinit'] = array('Imagedraw.Init()');

        return view('imagedraw.index', $data);
    }
    
}