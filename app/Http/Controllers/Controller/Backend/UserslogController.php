<?php


namespace  App\Http\Controllers\Controller\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Validator;
use Auth;

class UserslogController extends Controller
{
    //
    public function index(){
        return view('Backend.login');
    }

    public function checklogin(Request $request){

        $user_data = array(
            'user_name'  => $request->get('user_name'),
            'password' => $request->get('password')
           );
           
           if(Auth::attempt($user_data))
           {
            return redirect('/');
           }
           else
           {
            return back()->with('error', 'خطأ في تسجيل الدخول');
           }


    }

    function successlogin()
    {
     return view('successinput');
    }

    function logout()
    {
     Auth::logout();
     return redirect('login');
    }
}
