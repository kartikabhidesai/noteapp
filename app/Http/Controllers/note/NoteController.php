<?php

namespace App\Http\Controllers\note;
use App\Http\Controllers\Controller;

class NoteController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.Init()');

        return view('note.index', $data);
    }
    
}