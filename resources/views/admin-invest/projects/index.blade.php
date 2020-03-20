@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card border-secondary">
                <div class="card-header h2 bg-tertiary">
                    Listado Proyectos
                    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success  float-right">Crear nuevo
                        proyecto</a>
                </div>

                @if ($projects->items() != null)
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 offset-md-8">
                                {{!! Form::open(['route' => 'projects.index','method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search']) !!}}
                                <div form-group>
                                    {{ Form::select('state', config('options.states'),null, ['class' => 'form-control']) }}
                                </div>
                                {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button> --}}
                                <button type="submit" class="btn btn-secondary">Buscar</button>
                                {{!! Form::close() !!}}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 1cm;">ID</th>
                                {{-- <th style="width: 5cm;">Codigo</th> --}}
                                <th style="width: 10cm;">Nombre</th>
                                <th style="width: 3cm;">Estado</th>
                                <th style="width: 3.8cm;">Fecha de Inicio</th>
                                <th style="width: 3cm;">Fecha de Finalización</th>
                                {{-- <th style="width: 1cm;">ID Grupo de Investigación</th> --}}
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td> {{ $project->id }} </td>
                                {{-- <td> {{ $project->code }} </td> --}}
                                <td> {{ $project->name }} </td>
                                <td> {{ $project->state }} </td>
                                <td>{{ date('d-m-Y', strtotime($project->startDate)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($project->endDate)) }}</td>
                                {{-- <td> {{ $project->investigation_group_id }} </td> --}}
                                <td width="10px">
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projects->render() }}
                </div>
                @else
                <p class="display-4 text-center"> No se encontraron coincidencias </p>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection