@extends('layouts.app')
@section('content')

{{--para leer un arreglo siempre es necesario foreach--}}
@foreach($empleados as $empleado)
<form action = "/updateEmployee" method="POST">
  @method('put')
@csrf  {{--para agregr el token--}}

<div class="mb-3">
  <input type="hidden" class="form-control" id="employeeID" value='{{$empleado->EmployeeID}}' name="id"> 
</div>

    <div class="form-group">
      <label for="exampleInputEmail1">LastName</label>
      <input type="text" class="form-control" id="LastName" value ='{{$empleado->LastName}}' name= "lastName">
{{--podemos acceder ya directamente al elemento Product->ProductName--}}
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">FirstName</label>
        <input type="text" class="form-control" id="firstName" value ='{{$empleado->FirstName}}' name= "firstName">

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="title" value ='{{$empleado->Title}}' name= "title">

      </div>
 
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endforeach
@endsection