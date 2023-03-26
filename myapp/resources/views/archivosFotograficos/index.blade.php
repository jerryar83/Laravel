@extends('layouts.app')
@section('content')
<h1>Archivos Fotograficos</h1>
<div class = "form-group ">
    {{ Form::open(array('method'=>'POST','action'=>'App\Http\Controllers\ArchivosFotograficosController@store','files'=>true))}}
    <div class = "form-group">
        {{Form::label('title','Nombre')}}
        {{Form::text('nombre',null,['class' =>'form-control'])}}
    </div>
    <div class = "form-group">
        {{Form::file('file',null,['class'=>'form-control'])}}
    </div>
    <div class = "form-group">
    {{Form::submit('Guardar Foto',['class'=>'btn btn-primary'])}}
    </div>
</div>


@endsection
@push('js')
@endpush
