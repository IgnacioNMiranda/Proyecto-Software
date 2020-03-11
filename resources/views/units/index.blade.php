@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 bg-tertiary">
                    Listado de unidades
                    <a href="{{ route('units.create') }}" class="btn btn-sm btn-success  float-right">Crear nueva unidad</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 6cm;">Nombre</th>
                                <th>País</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <td> {{ $unit->name }} </td> 
                                <td> {{ $unit->country }} </td> 
                                <td width="10px">
                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-secondary">
                                        Editar
                                    </a>    
                                </td>       
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{ $units->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection