<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Validator;
use App\User;
use Spatie\Permission\Models\Role;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        
        return 'user_name';
    }

     protected function authenticated(Request $request , $user){

        // $ur = User::find(3);

       // auth()->user()->revokePermission('add product ');

        //dd($ur);
        
        // dd(auth()->user()->getallpermissions());
    //    return User::role('admin')->get();
  
        if($user->hasRole('admin')){
            return redirect('/');
        }
        elseif($user->hasRole('labuser')){
            return redirect('/choclateOrdersAll');
        }
        else
        return redirect('/');

    }

}
