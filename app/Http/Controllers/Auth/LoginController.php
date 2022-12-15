<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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

    protected function authenticated(Request $request, $user)
    {
        // $users = User::all();
        // $role = $users->role;
        // // @foreach($users as $user){
        // //     // if (){
        // //     //     return redirect()->route('kasir');
        // //     // }
        // //     // else{
        // //     //     return redirect()->route('home');
        // //     // }
        // //     $role = $user->role;
        // // }
        // // @endforeach
        // if($this->$role == 'kasir'){
        //     return redirect()->route('kasir');
        // }
    }

}
