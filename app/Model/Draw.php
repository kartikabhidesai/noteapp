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
    
    public function addDraw($request){
        
        $name = '';
        if($request->file()){
            $file = $request->file('fileupload');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/file/');
            $file->move($destinationPath, $name);    
        }
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $objadd = new Draw();
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
}
