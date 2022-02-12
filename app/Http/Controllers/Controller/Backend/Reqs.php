<?php

namespace App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Material;
use App\Model\Backend\Order;
use App\Model\Backend\Req;
use Illuminate\Support\Facades\URL;
use App\User;
use datetime;


class Reqs extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
          

      return view('Backend.Pages.req.reqs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  dd('ssada');

         // $material=  Material::get();
         $material=  Material::select()
         ->where('type','1')
         ->get()
         ;


         $materialT2=  Material::select()
         ->where('type','2')
         ->get( )
         ;

         $materialT3=  Material::select()
         ->where('type','3')
         ->get( )
         ;
         
         $lastid = Order::select('id')
         ->limit(1)
         ->orderBy('id','desc')
         ->get();
        //  return $lastid;
        
        foreach($lastid as $last_id){ 
            return view('Backend.Pages.req.form',compact('material','materialT2','materialT3','last_id',));
        }


    }

    /**
     * Store a newly create_at resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->qty1[0]);
        $test_req = 0;
        $test = 0 ;
        if(count($request->qty1) > 0  )
        {
              $sum=0;
        foreach($request->qty1 as $item=>$v){

           if( $request->qty1[$item] != 0 && $request->qty2[$item] != 0 ){
               $sum=$request->qty1[$item] + $request->qty2[$item]  ;
            //    dd($sum);
            
        }
        else{
           $test_req += 1  ;
        }
         } 
        }

        if($sum>0){
            
            $data=$request->all();
            // dd($data); 
            if(count($request->qty1) > 0 )
            {
                  $lastid=Order::create($data)->id;
                  $sum=0;
            foreach($request->qty1 as $item=>$v){
               if( $request->qty1[$item] != 0 &&  $request->qty2[$item] != 0  ){
                    $sum=$request->qty1[$item] + $request->qty2[$item]  ;
                    // if($request->material_id[$item] >= 100 && $request->material_id[$item] <= 117 )
                    // {
                    //    $test++;
                    // };

                     $data2=array(
                    'order_id'=>$lastid,
                    'material_id'=>$request->material_id[$item],
                    'qty1'=>$request->qty1[$item],
                    'qty2'=>$request->qty2[$item],
                    'qty2'=>$request->qty2[$item],
                    
                );

                Req::insert($data2);

            }
          } 
       }
            if($sum>0 && $test_req !=0){
                
            return redirect()->back()->with('success','تم إرسال طلب الشراء بنجاح ');  
         }  
      }
        return redirect('/')->withInput()->with('Danger',' فشل ارسال الطلب , الرجاء ادخال الكمية والجرد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
