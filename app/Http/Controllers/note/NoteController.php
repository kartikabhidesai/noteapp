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
    
    public function addnote(){
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.Add()');

        return view('note.add-note', $data);
    }
    
    
    public function editnote(){
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.edit()');

        return view('note.edit-note', $data);
    }
    
    
    
    public function viewnote(){
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.view()');

        return view('note.view-note', $data);
    }
    
    public function deletenote(){
        
    }
    
}