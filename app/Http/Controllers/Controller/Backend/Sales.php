<?php

namespace App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class Sales extends Controller
{
    
    


    public function index()
    {

       return view('Backend.Pages.sale.sales');
    }



    public function shaalan()
    {

       return view('Backend.Pages.branches.sales_shaalan');
    }


    function savs(Request $request){
         //  |email|unique:students' |min:5|max:12,

      $validator = Validator::make($request->all(),[
          'name'=>'required',
          'email'=>'required',
          'password'=>'required'
      ]);

      if(!$validator->passes()){
          return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
      }else{
          $values = [
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>Hash::make($request->password)
          ];
        return response()->json(['status'=>1, 'msg'=> $request->email]);
      }
}



}
