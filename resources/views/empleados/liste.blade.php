@extends('layouts.dashboard')

@section('title', 'Lista de Conductores')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lista de Conductores</h1>
        </div>
        <div class="section-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($conductores as $conductor)
                        <tr>
                            <td>{{ $conductor->usuario->nombre }}</td> <!-- Aquí accedes al objeto 'usuario' -->
                            <td>{{ $conductor->usuario->apellido }}</td>
                            <td>{{ $conductor->url_licencia }}</td>
                            <td>{{ $conductor->usuario->telefono }}</td>
                            <td>{{ $conductor->usuario->direccion }}</td>
                            <td>{{ $conductor->estatus }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay conductores registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection
