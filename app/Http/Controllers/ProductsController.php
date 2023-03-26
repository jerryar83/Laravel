<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// para poder utilisar request all
//use Request;


class ProductsController extends Controller
{
    public function index()
    {
        
        // $products = Product::all();
      // return View::make('products.index');


      $products =  Product::select('ProductID', 'ProductName', 'Categories.CategoryName', 'UnitPrice', 'UnitsInStock' )
                ->join('Categories', 'Products.CategoryID', '=', 'Categories.CategoryID')
                ->where('Discontinued','=',0)
                ->get();


          return View::make('products.index')->with('products', $products);
     }
     public function edit($id)
     {
        $product = Product::select('ProductID', 'ProductName', 'Categories.CategoryName', 'UnitPrice', 'UnitsInStock' )
        ->join('Categories', 'Products.CategoryID', '=', 'Categories.CategoryID')
        ->where('ProductID', $id)
        ->get();
 
         return View('products.edit',compact('product'));
 
     }

    public function update(Request $request){
        
        $request->all();
        $id= $request->input('id');
        $productName = $request->input('productName');
        $categoryName = $request->input('categoryName');
        $categoryID = Categories::select('CategoryID')
        ->where('CategoryName',$categoryName)
        ->first();

        $unitPrice = $request->input('unitPrice');
        $unitsIntStock = $request->input('unitsInstock');


       // $this->validate($request,[
         //   'ProductName' => 'required',
           // 'CategoryName' => 'required',
            //'UnitPrice' => 'required |min:0.1|max:10000',
            //'UnitsInstock' => 'required'
        //]);
        
        $update= Product::where('ProductID',$id)
        ->update(['ProductName' => $productName,
        'CategoryID' =>$categoryID->CategoryID,
        'UnitPrice'=>$unitPrice,
        'UnitsInstock'=>$unitsIntStock
        ]);

        return redirect('/IndexProducts');
    }

    public function eliminarProducto($id){
        $elimina = Product::where('ProductID',$id)->First();
        //soft Delete (el metodo idela no elimina solo hace un update
        if($elimina){
            $softDelete = Product::where('ProductID',$id)
            ->update(['Discontinued'=>1]);
        }
        else{
            return "error";
            //Hard delete (no recomendado)
            $eliminacion = Product::where('ProductID',$id)
            ->delete($id);
        }

        if($softDelete>=1){
            return redirect('/IndexProducts');
        }


    }


}