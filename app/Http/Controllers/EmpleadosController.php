<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Empleado;
use Illuminate\Http\Request;


class EmpleadosController extends Controller
{
    
    public function index()
    {
        
         $empleados = Empleado::all()->where('statusE','=',0);
         
      // return View::make('products.index');


   //   $empleados =  Empleado::select('ProductID', 'ProductName', 'Categories.CategoryName', 'UnitPrice', 'UnitsInStock' )
     //           ->join('Categories', 'Products.CategoryID', '=', 'Categories.CategoryID')
       //         ->get();


          return View::make('employees.index')->with('empleados', $empleados);
     }
    //
    public function edit($id)
    {
       $empleados = Empleado::select('EmployeeID', 'LastName', 'FirstName','Title' )
       ->where('EmployeeID', $id)
       ->get();

        return View('employees.edit',compact('empleados'));

    }

    public function update(Request $request){
        
      $request->all();
      $id= $request->input('id');
      $lastName = $request->input('lastName');
      $firstName = $request->input('firstName');
      $title = $request->input('title');



   
      
      $update= Empleado::where('EmployeeID',$id)
      ->update(['LastName' => $lastName,
      'FirstName' =>$firstName,
      'Title'=>$title,
      ]);

      return redirect('/listaEmpleados');
  }

    public function deleteEmployee($id){

      $delete = Empleado::where('EmployeeID',$id)->First();
     // $elimina = Product::where('ProductID',$id)->First();

      if($delete){

        $employeeDelete = Empleado::where('EmployeeID',$id)
        ->update(['statusE'=>1]);


      }
      else{
        return "error";
        //Hard delete (no recomendado)
        $eliminacion = Empleado::where('EmployeeID',$id)
        ->delete($id);
      }
      if($employeeDelete>=1) {
          return redirect('/listaEmpleados');


      }


    }



}
