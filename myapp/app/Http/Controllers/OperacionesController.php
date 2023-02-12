<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperacionesController extends Controller
{
    // Crear 4 funciones
    //permitir la entrada de 2 datos (numer 1 y numero2)
    //dependiendo de la funcion Suma,resta,div,mult
    //mostrar el resultado
    // /operaciones/suma4/5
    // /operadiones/resta/{numero1}/{numero2}
    //1- crear la funicon controller
    //2- crear la ruta (web) que apunte a la funcion
    //3- Crear un blade que pinte el recultado

     public function show($ok){
        return view('suma'); 
      }

     public function suma($numero1,$numero2){
      $resultado = $numero1 +$numero2;

        return view('suma', compact('resultado'));
        
        
     }

      public function resta($numero1,$numero2){
        $resultado = $numero1 -$numero2;
  
          return view('resta', compact('resultado'));
          
          
      }
      public function division($numero1,$numero2){
        $resultado = $numero1 /$numero2;
  
          return view('division', compact('resultado'));
          
          
      }
      public function multiplicacion($numero1,$numero2){
        $resultado = $numero1 * $numero2;
  
          return view('multiplicacion', compact('resultado'));
          
          
      }



}
