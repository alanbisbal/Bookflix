<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Perfil;
use App\Pago;
use App\Tarjeta;
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
            'f_nac' =>['required','before:01/01/2012'],
            'n_tarjeta' =>['required','size:12','integer'],
            't_codigo' =>['required','size:3','integer'],
            'titular' =>['required'],
        ],
      [
          'f_nac.before'=>'La fecha debe ser mayor de 18 años',
          'f_nac.required'=>'La fecha debe ser ingresada',
          'n_tarjeta.required'=>'El numero de tarjeta es requerido',
          'n_tarjeta.size'=>'La tarjeta debe ser de 12 digitos',
          'n_tarjeta.integer'=>'La tarjeta solo se permite numeros',

          't_codigo.required'=>'El codigo de tarjeta es requerido',
          't_codigo.size'=>'El codigo debe ser de 3 digitos',
          't_codigo.integer'=>'El codigo solo se permite numeross',

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
          'idBanco'=> 1,
          ]);
      Pago::create([
        'idTarjeta'=>$tarjeta['id'],
        'monto'=>500,
      ]);



      return $user;

    }
}