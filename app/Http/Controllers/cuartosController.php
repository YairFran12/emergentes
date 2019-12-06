<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cuarto;
use App\comentario;
use App\cuarto_foto;
use App\cuarto_servicio;
use App\servicio;

class cuartosController extends Controller
{
    public function ver_cuartos($id){
        $datosc= cuarto::where('id', $id)->get();
        $datoss= DB::table('cuarto_servicios')
                 ->select(['cuarto_servicios.*', 'servicios.*'])
                 ->join('servicios', 'cuarto_servicios.id_Servicio', '=', 'servicios.id')
                 ->where('cuarto_servicios.id_Cuarto', $id)
                    ->get();

        $datoscom= DB::table('comentarios')
        ->select(['comentarios.*', 'foraneos.nombre'])
        ->join('foraneos', 'comentarios.id_Foraneo', '=', 'foraneos.id')
        ->where('comentarios.id_Cuarto', $id)
           ->get();        

           $datosarr= DB::table('cuartos')
           ->select(['arrendatarios.*'])
           ->join('arrendatarios', 'cuartos.id_Arrendatario', '=', 'arrendatarios.id')
           ->where('cuartos.id', $id)
              ->get();        
              
        $datoimg= cuarto_foto::where('id', $id)->get();

        return view ('verCuarto')
        ->with('datos', $datosc)->with('servicio', $datoss)->with('coment', $datoscom)->with('arrend', $datosarr)->with('imgs', $datoimg);
    }
    
}
