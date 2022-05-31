@extends('layouts.app')
@section('tablaUsuario')
<section class="py-5 my-5 mx-auto container">
<table id="tabla-facha-user" class="display">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Fecha Incio</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at}}</td>
                <td>
                    <a href="{{ url('/admin/' . $user->id . '/edit') }}">
                        Editar
                    </a>

                    
                
                    <form action="{{ url('/admin/' . $user->id) }}" method="post">
                        @csrf
                       
                        {{ method_field('DELETE') }}
                        <input style="cursor:pointer" type="submit" onclick="return confirm('¿Estas seguro de eliminar este usuario')"
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
    $('#tabla-facha-user').DataTable();
} );</script>

</section>

@endsection