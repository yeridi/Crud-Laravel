@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ url('empleado/create') }}" class="btn btn-success mb-5">Registrar Nuevo Empleado</a>

    <div class="alert alert-success alert-dismissible" role="alert">
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    <table class="table table-light text-center">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Fotografia</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $empleados as $empleado )
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="100" class="img-thumbnail img-fluit"></td>
                <td>{{ $empleado->Nombre }}</td>
                <td>{{ $empleado->ApellidoPaterno }}</td>
                <td>{{ $empleado->ApellidoMaterno }}</td>
                <td>{{ $empleado->Correo }}</td>
                <td>
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                    Editar
                </a>


                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" class="d-inline" >
                @csrf
                {{ method_field('DELETE') }}
                    <input type="submit"  onClick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                </form>

                </td>
                <td></td>
            </tr>
            @endforeach

        </tbody>

    </table>
</div>
@endsection