<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use Config;

class Note extends Model {

    protected $table = 'note';
    
    public function notelist($id=NULL){
        if($id){
            $result = note::select("*")
                    ->where('id','=',$id)
                    ->get()->toarray();
        return $result;
        }else{
            $result = note::orderByRaw('created_at  DESC')
              ->get()->toarray();
            return $result;
        
        }
    }

        public function addNote($request){
        $ip = $_SERVER['REMOTE_ADDR'];
        $objadd = new Note();
        $objadd->note_titile = $request->input('noteTitle');
        $objadd->note_description = $request->input('noteDescription');
        $objadd->ip_address = $ip;
        $result = $objadd->save();
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function editNote($request){
        $objEdit = Note::find($request->input('id'));
        $objEdit->note_titile = $request->input('noteTitle');
        $objEdit->note_description = $request->input('noteDescription');
    
         if ($objEdit->save()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function deletenote($request){
        return Note::where('id', $request->input('id'))->delete();
    }
}
