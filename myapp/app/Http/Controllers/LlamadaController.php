<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LlamadaController extends Controller
{
    //
    public function index(){
        return 'Index';    
    }

    public function edit($id){
        return 'El id a modificar es ' .$id ; 
    }
    public function show($valor){
        return view('llamada'); 
    }
    public function showData($nombre,$edad){
        //return view('llamada')->with('dato',$nombre)->with('dato',$edad); 
        return view('llamada', compact('nombre','edad'));
    }

    public function blades(){
       // $alumnos=['Fredy','Gerardo','Brianda','Jose','Omar','Mario'];
        $alumnos=[];
        return view('complementos',compact('alumnos'));
    }

}
