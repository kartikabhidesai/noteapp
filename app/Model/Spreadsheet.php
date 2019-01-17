<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use App\Model\UserHasPermission;
use App\Model\Sendmail;
use Config;

class Spreadsheet extends Model {

    protected $table = 'spreadsheet';
    
    public function usersheetlist($id){
        $result = Spreadsheet::orderByRaw('created_at  DESC')
                 ->where('user_id',$id)
                 ->get()->toarray();
        return $result;
    }
    
    public function usersheetadd($request,$userid){
        $ip = $_SERVER['REMOTE_ADDR'];
        $objsheet=new Spreadsheet;
        $objsheet->user_id=$userid;
        $objsheet->title=$request->input('title');
        $objsheet->data = $request->input('jsondata');
        $objsheet->ip_address = $ip;
        $objsheet->created_at = date('Y-m-d H:i:s');
        $objsheet->updated_at = date('Y-m-d H:i:s');
        return $objsheet->save();
    }
    
    public function usersheetedit($id){
        $result = Spreadsheet::select("*")
                 ->where('id',$id)
                 ->get()->toarray();
        return $result;
    }
    
    public function sheetEdit($request,$userid){
        
        $objsheet = Spreadsheet::find($request->input('id'));
        $objsheet->title=$request->input('title');
        $objsheet->data = $request->input('jsondata');
        $objsheet->updated_at = date('Y-m-d H:i:s');
        return $objsheet->save();
    }
    
    
    public function sheetDelete($request){
        return Spreadsheet::where('id', $request->input('id'))->delete();
    }
   
}
