<?php

namespace App\Http\Controllers;

use App\cuarto;

use App\universidad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class buscarController extends Controller
{
    public function nuevaBusqueda(Request $request){
    

    //$buscar = busqueda::whereBet('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
    $buscar = cuarto::all();
    
    
    return $buscar;
   }

    public function nuevaBusqueda2($sexo,$inmueble,$minimo,$maximo){
      
    $buscar = cuarto::where('sexo',$sexo)
                    ->where('inmueble',$inmueble)
                    ->whereBetween('precio_renta',[$minimo,$maximo])
                    ->get();
    
    
    return $buscar;
   }

     public function nuevaBusqueda3($universidad){
      
    $buscar = universidad::where('name',$universidad)->get();
    
    
    return $buscar;
   }
}
