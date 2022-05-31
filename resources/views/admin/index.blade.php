<!-- {{-- @if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif --}} -->

@extends('layouts.app')
@section('tabla')
<section class="py-5 my-5 mx-auto container">
<table id="tabla-facha" class="display">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Foto</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($focaccias as $focaccia)
            <tr>
                <td>{{ $focaccia->id }}</td>
                <td>{{ $focaccia->Nombre }}</td>
                <td>{{ $focaccia->Descripcion }}</td>
                <td>{{ $focaccia->Precio }}</td>
                <td>
                    <img src="{{ asset('storage') . '/' . $focaccia->Foto }}" alt="" width="100">
                </td>
                <td>
                    <a href="{{ url('/admin/' . $focaccia->id . '/edit') }}">
                        Editar
                    </a>

                    
                
                    <form action="{{ url('/admin/' . $focaccia->id) }}" method="post">
                        @csrf
                       
                        {{ method_field('DELETE') }}
                        <input style="cursor:pointer" type="submit" onclick="return confirm('¿Estas seguro de eliminar esta focaccia')"
                            value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>$(document).ready( function () {
    $('#tabla-facha').DataTable();
} );</script>

</section>

@endsection