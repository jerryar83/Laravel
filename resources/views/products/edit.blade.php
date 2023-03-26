@extends('layouts.app')
@section('content')

{{--para leer un arreglo siempre es necesario foreach--}}
@foreach($product as $product)
<form action = "/updateProduct" method="POST">
  @method('put')
@csrf  {{--para agregr el token--}}

<div class="mb-3">
  <input type="hidden" class="form-control" id="productName" value='{{$product->ProductID}}' name="id"> 
</div>

    <div class="form-group">
      <label for="exampleInputEmail1">ProducName</label>
      <input type="text" class="form-control" id="productName" value ='{{$product->ProductName}}' name= "productName">
{{--podemos acceder ya directamente al elemento Product->ProductName--}}
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">CategoryName</label>
        <input type="text" class="form-control" id="categoryName" value ='{{$product->CategoryName}}' name= "categoryName">

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">UnitPrice</label>
        <input type="text" class="form-control" id="productName" value ='{{$product->UnitPrice}}' name= "unitPrice">

      </div>
    <div class="form-group">
        <label for="exampleInputEmail1">UnitsInStock</label>
        <input type="text" class="form-control" id="units" min="1" step="1" max="1000"  value ='{{$product->UnitsInStock}}' name= "unitsInstock">
  
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endforeach
@endsection