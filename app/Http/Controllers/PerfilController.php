<?php

namespace App\Http\Controllers;
use Illuminate\Support;
use App\User;
use App\Perfil;
use App\Pago;
use App\Lectura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




use Illuminate\Foundation\Auth\AuthenticatesUsers;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function seleccionPerfil()
    {

        if(auth()->user()->es_admin){
          return view('administracion');
        }
        if (auth()->user()->es_premium) {
          $cant=4;
        }
        else{
          $cant=2;
        }
        $contador=0;
        $perfiles=Perfil::where("email","=",auth()->user()->email)
                        ->take($cant)->get();

        return view('seleccionPerfil',compact('perfiles','cant'));
    }

    public function agregarPerfil()
    {
        return view('agregarPerfil');
    }


    public function verCuenta()
    {

        return view('verCuenta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function perfilActivo($id)
    {
      $perfil = Perfil::findOrFail($id);
      session(['perfil' => $perfil]);
      return redirect('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required',]);
      $perfil=request()->except('_token');
      if($request->hasFile('imagen')){
            $perfil['imagen']=$request->file('imagen')->store('uploads','public');
      }
      Perfil::insert($perfil);
      return redirect()->action('PerfilController@seleccionPerfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
       $request->validate([
     'nombre' => 'required',
      ],
     [
       'nombre.required' => 'El nombre es requerido',
     ]);
     $perfilActualizado = Perfil::find($id);
     $perfilActualizado->nombre = $request->nombre;
     if(isset($request->imagen)){
          $perfilActualizado->imagen=$request->file('imagen')->store('uploads','public');
     }
     $perfilActualizado->save();
      return redirect()->action('PerfilController@seleccionPerfil');
     }

      public function updateCuenta(Request $request)
      {
        $request->validate([
          'nombre' => 'required',
          'apellido' => 'required',
          'password' => ['required','min:8'],
          'titular' => 'required',
          'numero' => ['required','digits:16'],
          'codigo' => ['required','digits:3',],
        ],
        [
          'nombre.required'=>'El nombre es requerido',
          'apellido.required'=>'El apellido es requerido',
          'password.required'=>'La contraseña es requerida',
          'password.digits'=>'La contraseña debe tener al menos 8 caracteres',
          'titular.required'=>'El nombre del titular es requerido',

          'numero.required'=>'El número de tarjeta es requerido',
          'numero.digits'=>'El número de tarjeta debe ser de 16 dígitos',

          'codigo.required'=>'El código de tarjeta es requerido',
          'codigo.digits'=>'El código de tarjeta debe ser de 3 dígitos ',
        ]);
        auth()->user()->name=$request->nombre;
        auth()->user()->apellido=$request->apellido;
        if(!($request->pass == auth()->user()->password)){
           auth()->user()->password = Hash::make($request->password);
        }
        auth()->user()->tarjeta->titular =$request->titular;
        auth()->user()->tarjeta->numero =$request->numero;
        auth()->user()->tarjeta->codigo =$request->codigo;
        auth()->user()->save();
        auth()->user()->tarjeta->save();
          return redirect()->action('PerfilController@seleccionPerfil');
      }



     public function cargarPerfil(Request $request,Perfil $perfil)
     {

       $request->validate([
         'nombre' => 'required',]);
       $cantidad_perfiles = Perfil::where("email","=",auth()->user()->email)->get();
     if(count($cantidad_perfiles)<4){
         $perfil=request()->except('_token');
         $perfil['email']=auth()->user()->email;
        if($request->hasFile('imagen')){
              $perfil['imagen']=$request->file('imagen')->store('uploads','public');
            }
        $perfil['estado']=1;
        Perfil::insert($perfil);
       }
       return redirect()->action('PerfilController@seleccionPerfil');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }



    public function solicitarPremium(Request $request)
    {
      $request->validate(
        [
        'pass' => 'required',
        ],
        [
        'pass.required' => 'Ingrese la contraseña',
        ]);
      if(Hash::check($request->pass,auth()->user()->password)){
        auth()->user()->es_premium=true;
        Pago::create([
          'idTarjeta'=>auth()->user()->tarjeta->id,
          'monto'=>300,
        ]);
        auth()->user()->save();
      }
      else{
        return back()->with('alertas','La contraseña ingresada es inválida');
      }
        return back()->with('alertas','Felicitaciones! Ahora sos premium!');
      }




      public function cancelarPremium(Request $request)
      {
        $request->validate(
          [
          'pass' => 'required',
          ],
          [
          'pass.required' => 'Ingrese la contraseña',
          ]);
      if(Hash::check($request->pass,auth()->user()->password)){
        auth()->user()->es_premium=false;
        auth()->user()->save();
      }
      else{
        return back()->with('alertas','La contraseña ingresada es inválida');
      }
        return back()->with('alertas','Dejaste de ser usuario premium');
      }




    public function libroLeido(Request $request)
    {
      $lectura= Lectura::where('idLibro',"=",$request->idLibro)->
                where('idperfil',"=",session('perfil')->id)->get();
       if(empty($lectura->first())){
         Lectura::create([
        'idperfil'=>session('perfil')->id,
        'idLibro'=>$request->idLibro,
        'leido'=> 1,
        'desde'=>$request->cap,
       ]);
          }
     else{
         $lectura->first()->desde=$request->cap;
         $lectura->first()->save();
       }
      return redirect(asset('storage').'/'.$request->cap);

    }




    public function editarPerfil($id)
    {
      $perfil = Perfil::findOrFail($id);
      return view('editarPerfil',compact('perfil'));
    }



    public function activarPerfil(Request $request,$id)
    {

      $request->validate(
      [
      'pass' => 'required',
      ],
      [
      'pass.required' => 'Ingrese la contraseña',
      ]);
      if(Hash::check($request->pass,auth()->user()->password)){
        $perfil = Perfil::findOrFail($id);
        $perfil->estado=1;
        $perfil->save();
      }
      else{
          return back()->with('alertas','La contraseña ingresada es inválida');
      }
      return redirect()->action('PerfilController@seleccionPerfil')->with('alertas','El perfil se activó correctamente');
      }


    public function desactivarPerfil(Request $request,$id)
    {
      $request->validate(
        [
        'pass' => 'required',
        ],
        [
        'pass.required' => 'Ingrese la contraseña',
        ]);
    if(Hash::check($request->pass,auth()->user()->password)){
      $perfil = Perfil::findOrFail($id);
      $perfil->estado=0;
      $perfil->save();
    }
    else{
        return back()->with('alertas','La contraseña ingresada es inválida');
      }
    return redirect()->action('PerfilController@seleccionPerfil')->with('alertas','El perfil se desactivó correctamente');
    }



    public function eliminarPerfil(Request $request,$id)
    {


      $request->validate(
        [
        'pass' => 'required',
        ],
        [
        'pass.required' => 'Ingrese la contraseña',
        ]);

    if(Hash::check($request->pass,auth()->user()->password)){
      $perfil = Perfil::findOrFail($id);
      $perfil->comentarios()->delete();
      $perfil->favoritos()->delete();
      $perfil->lecturas()->delete();
      $perfil->calificaciones()->delete();
      $perfil->delete();
    }
    else{
        return back()->with('alertas','La contraseña ingresada es inválida');
      }
    return redirect()->action('PerfilController@seleccionPerfil')->with('alertas','El perfil se eliminó correctamente');
    }
}
