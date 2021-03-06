<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use Config;

class Draw extends Model {

    protected $table = 'draw';
    
    public function filelist($id=NULL){
        if($id){
            $result = Draw::where('id','=',$id)
              ->get()->toarray();
        return $result;
        }else{
         $result = Draw::orderByRaw('created_at  DESC')
              ->get()->toarray();
        return $result;}
    }
    public function userfilelist($id){
         $result = Draw::orderByRaw('created_at  DESC')
                 ->where('user_id',$id)
                 ->get()->toarray();
        return $result;
    }

    public function addDraw($request,$id){
        
        $name = '';
        if($request->file()){
            $file = $request->file('fileupload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/file/');
            $file->move($destinationPath, $name);    
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $objadd = new Draw();
        $objadd->user_id = $id;
        $objadd->draw_name = $request->input('filetitle');
        $objadd->filename = $name;
        $objadd->ip_address = $ip;
        $result = $objadd->save();
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function editDraw($request){
//        print_r($request->input());
//        exit;
//        [filetitle] => Hello I am Parth
//        [id] => 6
        $name = '';
        $result = Draw::select("filename")
                 ->where('id',$request->input('id'))
                 ->get()->toarray();
        
        $file=  base_path().'/public/uploads/file/'.$result[0]['filename'];
        if (file_exists($file)) {
               unlink($file);  
        }
        
        if($request->file()){
            $file = $request->file('fileupload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/file/');
            $file->move($destinationPath, $name);    
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $objedit = Draw::find($request->input('id'));
        $objedit->draw_name = $request->input('filetitle');
        $objedit->filename = $name;
        $objedit->ip_address = $ip;
        return($objedit->save()); 
//        /$objadd = new Draw();
//        return $result;
//        print_r();
//        die();
    }

    public function fileDelete($request){
        if($request->input('image'))
        {
        
         $file=  base_path().'/public/uploads/file/'.$request->input('image');
        
            if (file_exists($file)) {
               unlink($file);  
            }
            return Draw::where('id', $request->input('id'))->delete();
        }
    }
    
    public function fileEDit($id){
       $result = Draw::select("id","draw_name","filename")
                 ->where('id',$id)
                 ->get()->toarray();
        return $result;
    }
}
