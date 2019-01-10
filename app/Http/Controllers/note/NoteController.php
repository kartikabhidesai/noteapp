<?php

namespace App\Http\Controllers\note;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\Note;
class NoteController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['detail'] = $this->loginUser;
        $objAddNote = new Note();
        $data['notelist'] = $objAddNote->usernotelist($data['detail']['id']);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array('');
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.Init()');

        return view('note.index', $data);
    }
    
    public function addnote(Request $request){
        $data['detail'] = $this->loginUser;
        if ($request->isMethod('post')) {
          $objAddNote = new Note();
          $addNote = $objAddNote->addNote($request,$data['detail']['id']);
            if ($addNote) {
                $return['status'] = 'success';
                $return['message'] = 'Note created successfully.';
                $return['redirect'] = route('note');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.Add()');

        return view('note.add-note', $data);
    }
    
    
    public function editnote(Request $request,$id=NULL){
        $objAddNote = new Note();
        $data['note'] = $objAddNote->notelist($id);
        if ($request->isMethod('post')) {
          $objAddNote = new Note();
          $addNote = $objAddNote->editNote($request);
            if ($addNote) {
                $return['status'] = 'success';
                $return['message'] = 'Note Edited successfully.';
                $return['redirect'] = route('note');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'something will be wrong.';
            }
            echo json_encode($return);
            exit;
        }
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.edit()');

        return view('note.edit-note', $data);
    }
    
    
    
    public function viewnote($id){
        $objAddNote = new Note();
        $data['note'] = $objAddNote->notelist($id);
        $data['plugincss'] = array();
        $data['pluginjs'] = array();
        $data['css'] = array();
        $data['js'] = array('note/note.js');
        $data['funinit'] = array('Note.view()');

        return view('note.view-note', $data);
    }
    
    public function deletenote(Request $request){
       if ($request->isMethod('post')) {
            $objAddNote = new Note();
            $deletenote = $objAddNote->deletenote($request);
            if ($deletenote) {
                $return['status'] = 'success';
                $return['message'] = 'Note delete successfully.';
                $return['redirect'] = route('note');
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