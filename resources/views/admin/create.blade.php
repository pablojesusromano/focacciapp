@extends('layouts.app')
@section('tabla')

<form action="{{ url('/admin') }}" method="post" enctype="multipart/form-data">
   
    @csrf  
    @include('admin.form')
</form>
@endsection