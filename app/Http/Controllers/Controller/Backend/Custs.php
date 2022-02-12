<?php

namespace App\Http\Controllers\Controller\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Backend\Cust;


class Custs extends Controller
{
    public function index()
        {

            return view('Backend.Pages.Cust.customers');

        }


        

    public function store(Request $request)
    {
        // dd('ssada');
        
        $customers = new Cust([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
        $customers->save();
        return redirect('/cust')->with('success', 'Contact saved!');
    }

}
