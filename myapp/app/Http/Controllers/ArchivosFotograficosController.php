<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class ArchivosFotograficosController extends Controller
{
    public function index(){
        
       //  $empleados = Empleado::all()->where('statusE','=',0);
         
   
          return View::make('archivosFotograficos.index');
                            
     }

     public function store(Request $request)
     {
       if($request->file('file'))
         {
            $file = $request->file('file');
            $nombreArchivoOriginal = $file->getClientOriginalName();
            

            $size = $file->getSize();
            if($size > 1000000)
            {
               return 'Error: archivo muy grande';
            }
            else
            {
            $file->move('images',$nombreArchivoOriginal);
            return $input['path']=$nombreArchivoOriginal;
            }

         }
      }
}