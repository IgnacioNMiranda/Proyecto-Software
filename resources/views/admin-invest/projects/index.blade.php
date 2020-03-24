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
                        {!! Form::open(['route' => 'projects.index','method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search']) !!}
                        <div class="form-group">
                            {{ Form::label('state','Estado') }}
                            {{ Form::select('state', config('options.states'),null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) }}
                        </div>
                        <button type="submit" class="btn btn-secondary mr-4">Buscar</button>
                        {!! Form::close() !!}

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
                    <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection