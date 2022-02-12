<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Runtime;

class FrontpageController extends Controller
{



     public function home()
    {
        return view('front_page.front_page');
    }
}
