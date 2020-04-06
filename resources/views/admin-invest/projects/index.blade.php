@extends('layouts.app')
@php
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Researcher;
@endphp
@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card border-secondary shadow">
                <div class="card-header h2 bg-tertiary">
                    Listado Proyectos
                    @auth
                    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success  float-right">Crear nuevo
                        proyecto</a>
                    @endauth
                </div>


                <div class="card-body">
                    {!! Form::open(['route' => 'projects.index','method' =>'GET','class' =>'navbar navbar-light
                    bg-light','role' => 'search']) !!}
                    <div class="form-group">
                        {{ Form::label('state','Estado') }}
                        {{ Form::select('state', config('options.states'),null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) }}
                    </div>
                    <button type="submit" class="btn btn-secondary mr-4">Buscar</button>
                    {!! Form::close() !!}

                    @if ($projects->items() != null)
                    @auth
                    @if(Auth::user()->userType == "Investigador" && Auth::user()->researcher_id != null)
                    @php
                    $currentResearcher = Researcher::find(Auth::user()->researcher_id);
                    //Se obtienen los grupos asociados al investigador conectado
                    $currentProjectsids =
                    Researcher::find($currentResearcher->id)->projects()->pluck('project_id')->toArray();
                    @endphp
                    @endif
                    @endauth
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha de Finalización</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td> {{ $project->id }} </td>
                                <td> {{ $project->name }} </td>
                                <td> {{ $project->state }} </td>
                                <td>{{ date('d-m-Y', strtotime($project->startDate)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($project->endDate)) }}</td>
                                <td width="10px">
                                    <a href="{{ route('projects.show', $project->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        Ver
                                    </a>
                                </td>
                                @auth
                                @if(Auth::user()->userType == "Administrador" || ( isset($currentResearcher) &&
                                in_array($project->id,$currentProjectsids)))
                                <td width="10px">
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        Editar
                                    </a>
                                </td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                @endauth
                                @if(Auth::user() == null)
                                <td></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projects->render() }}
                    @else
                    <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection