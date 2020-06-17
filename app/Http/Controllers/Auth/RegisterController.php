<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Perfil;
use App\Pago;
use App\Tarjeta;
use App\Banco;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::AGREGARPERFIL;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $bancos = Banco::all();

        return view('auth.register', compact('bancos'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'f_nac' =>['required','before:01/01/2002'],
            'n_tarjeta' =>['required','digits:16'],
            't_codigo' =>['required','digits:3',],
            'titular' =>['required'],
        ],
      [
          
          'f_nac.before'=>'La fecha debe ser mayor de 18 años',
          'f_nac.required'=>'La fecha debe ser ingresada',
          'n_tarjeta.required'=>'El número de tarjeta es requerido',
          'n_tarjeta.digits'=>'La tarjeta debe ser de 12 dígitos',

          't_codigo.required'=>'El código de tarjeta es requerido',
          't_codigo.digits'=>'El código debe ser de 3 dígitos ',

      ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user=User::create([
         'name' => $data['name'],
         'apellido' => $data['apellido'],
         'email' => $data['email'],
         'password' => Hash::make($data['password']),
         'f_nac'=>$data['f_nac'] ,
         'es_premium'=>false,
         'es_admin'=>false,
     ]);

     $tarjeta=Tarjeta::create([
          'email' => $data['email'],
          'titular' => $data['titular'],
          'numero'=>$data['n_tarjeta'],
          'codigo'=>$data['t_codigo'],
          'idBanco'=>$data['idBanco'],
          ]);
      Pago::create([
        'idTarjeta'=>$tarjeta['id'],
        'monto'=>500,
      ]);



      return $user;

    }
}