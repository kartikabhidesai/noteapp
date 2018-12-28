<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use Config;

class Files extends Model {

    protected $table = 'file';
    
    public function filelist($id=NULL){
        if($id){
            $result = Files::where('id','=',$id)
              ->get()->toarray();
        return $result;
        }else{
         $result = Files::orderByRaw('created_at  DESC')
              ->get()->toarray();
        return $result;}
    }
    
    public function addFile($request){
        
        $name = '';
        if($request->file()){
            $file = $request->file('fileupload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/file/');
            $file->move($destinationPath, $name);    
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $objadd = new Files();
        $objadd->file_name = $name;
        $objadd->file_title = $request->input('filetitle');
        $objadd->ip_address = $ip;
        $result = $objadd->save();
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function editFile($request){
        $name = '';
        $fileid=$request->input('fileid');
       if($request->file()){
        
        $result = Files::where('id','=',$fileid)
              ->get()->toarray();
        $oldfile=$result[0]['file_name'];
        $file=  base_path().'/public/uploads/file/'.$oldfile;
        
            if (file_exists($file)) {
               unlink($file);  
            }
            $file = $request->file('fileupload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/file/');
            $file->move($destinationPath, $name);    
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $objedit = File::find($fileid);
        $objedit->file_name = $name;
        $objedit->file_title = $request->input('filetitle');
        
        if ($objedit->save()) {
            return TRUE;
        } else {

            return FALSE;
        }
        
    }
    
    public function fileDelete($request){
        if($request->input('image'))
        {
        
         $file=  base_path().'/public/uploads/file/'.$request->input('image');
        
            if (file_exists($file)) {
               unlink($file);  
            }
            return Files::where('id', $request->input('id'))->delete();
        }
    }
}
