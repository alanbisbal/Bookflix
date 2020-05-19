<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Perfil;
use App\User;
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
    protected $redirectTo = RouteServiceProvider::PERFIL;

    public function authenticated($request , $user){
        if(auth()->user()->es_admin){
            return redirect()->route('administracion') ;
        }else
          {
            $perfil_usuario = Perfil::where('email','=',auth()->user()->email);
            if($perfil_usuario->count()<1){
              return redirect()->route('agregarPerfil');
            }
            else{
              return redirect()->route('seleccionPerfil') ;
            }

        }
      }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
