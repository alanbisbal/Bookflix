<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Lectura;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Admin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function estadisticas()
     {


         $uTot= User::all()->count();
         $u18y30=User::all()
                            ->where('f_nac', '>=', '1990-01-01' )->count();
         $u31y50=User::all()->where('f_nac', '<', '1989-01-01' )
                            ->where('f_nac', '>=', '1970-01-01' )->count();
         $u51mas=User::all()->where('f_nac', '<', '1969-01-01' )->count();


         $uMasComentarios=DB::table('users')
                     ->join('perfils', 'users.email', '=', 'perfils.email')
                     ->join('comentarios', 'perfils.id', '=', 'comentarios.idperfil')
                     ->select('users.*')->distinct()
                     ->get();



         $uMasLecturas=DB::table('users')
                     ->join('perfils', 'users.email', '=', 'perfils.email')
                     ->join('lecturas', 'perfils.id', '=', 'lecturas.idperfil')
                     ->select('users.*')->distinct()
                     ->get();



        $masLeidos=Libro::withCount('lecturas')->get()->sortBy('lecturas_count')->reverse();

        $masLeidos=$masLeidos->take(10);
        $uMasLecturas=$uMasLecturas->take(10);
        $uMasComentarios=$uMasComentarios->take(10);

        $uPremium=User::all()->where('es_premium', '=', 1 );
        $uNoPremium=User::all()->where('es_premium', '=', 0 );
         return view('estadisticas',compact('uTot','u18y30','u31y50','u51mas',
         'uMasLecturas','uMasComentarios','uPremium','uNoPremium','masLeidos'));

     }

     public function usuariosEntreFechas(Request $request)
     {
       $request->validate([
     'fechaInicio' => 'required',
     'fechaFin' => 'required|after:'.$request->fechaInicio,
      ],
     [
       'fechaFin.after' => 'La fecha de inicio debe ser menor que la fecha de fin',
     ]);
          $dateFin = new Carbon( $request->fechaFin );
          $dateInicio = new Carbon( $request->fechaInicio );
          $dateFin->day=$dateFin->day+1;
          $usuariosEntreFechas=User::where('created_at','>=',$dateInicio)
                                ->where('created_at','<',$dateFin)->get();

         return view('verUsuariosEntreFechas',compact('usuariosEntreFechas'));
     }


     public function librosMasLeidos()
     {

      $masLeidos=Libro::withCount('lecturas')->get()->sortBy('lecturas_count')->reverse();
       return view('librosMasLeidos',compact('masLeidos'));
     }





     public function agregarLibro()
     {
         return view('agregarLibro');
     }



     public function update()
     {

         return view('test');
     }

     public function agregarAutor()
     {
         return view('agregarAutor');
     }

     public function agregarEditorial()
     {
         return view('agregarEditorial');
     }

     public function agregarNovedad()
     {
         return view('agregarNovedad');
     }
     public function administracion()
     {
         return view('administracion');
     }
     public function perfil()
     {
         return view('perfil');
     }




}
