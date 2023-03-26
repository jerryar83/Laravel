<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->where('statusE','=',0);
         
        // return View::make('products.index');
  
  
     //   $empleados =  Empleado::select('ProductID', 'ProductName', 'Categories.CategoryName', 'UnitPrice', 'UnitsInStock' )
       //           ->join('Categories', 'Products.CategoryID', '=', 'Categories.CategoryID')
         //         ->get();
  
  
            return View::make('employees.index')->with('employees', $employees);
    }
}
