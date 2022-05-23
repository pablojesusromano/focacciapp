@extends('layouts.app')
@section('tabla')

<form action="{{ url('/focaccia') }}" method="post" enctype="multipart/form-data">
   
    @csrf  
    @include('focaccia.form')
</form>
@endsection