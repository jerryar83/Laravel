@extends('layouts.app')
@section('content')
    <h1>Complementos </h1>

    
        @if (count($alumnos)>0)
        <ol>
        @foreach($alumnos as $alumno)
   
        <li>{{$alumno}}</li>
     
      
        @endforeach
        </ol>
        @else
        <p>El array esta vacio</p>
        @endif
    
@stop