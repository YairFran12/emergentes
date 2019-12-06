<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cuarto;

class filtrarController extends Controller
{
    public function nuevaBusqueda(Request $request){
        
        $sexo= $request->input('sexo');
        $minimo=$request->input('minimo');
        $maximo=$request->input('maximo');

    
    $buscar = cuarto::where('sexo',$sexo)
                    ->whereBetween('precio',[$minimo,$maximo])
                    ->get();
    
    
    return $buscar;
   }

   public function nuevaBusqueda2(Request $request){
    

    //$buscar = busqueda::whereBet('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
    $buscar = cuarto::all();
    
    
    return $buscar;

}
}