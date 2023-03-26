@extends('layouts.app')
@section('content')
<h1>Employees</h1>
{{--@include ('employees.lista') --}}
@include ('employees.lista')
@endsection
@push('js')
@endpush

