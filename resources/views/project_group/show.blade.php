@extends('layouts.app')
@php
use App\Researcher;
@endphp


@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-12 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 bg-tertiary">
                    Listado de Proyectos Asociados
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => ['projects_groups.show', $id] ,'method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search']) !!}
                    <div class="form-group">
                        {{ Form::label('state','Estado') }}
                        {{ Form::select('state', config('options.states'),null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) }}
                    </div>
                    <button type="submit" class="btn btn-secondary mr-4">Buscar</button>
                    {!! Form::close() !!}
                    @if (!empty($invProjects))
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th >ID</th>
                                    {{-- <th style="width: 5cm;">Codigo</th> --}}
                                    <th >Nombre</th>
                                    <th >Estado</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Finalización</th>
                                    {{-- <th style="width: 1cm;">ID Grupo de Investigación</th> --}}
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invProjects as $project)
                                <tr>
                                    <td> {{ $project->id }} </td>
                                    <td> {{ $project->name }}</td> 
                                    <td> {{ $project->state }}</td>
                                    <td>{{ date('d-m-Y', strtotime($project->startDate)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($project->endDate)) }}</td>
                                    <td width="10px">
                                        <a href="{{ route('projects.show', $project->id) }}"
                                            class="btn btn-sm btn-secondary">
                                            Ver
                                        </a>
                                    </td>
                                    @if($currentUser != null)
                                        @if ($currentUser->userType == "Administrador")
                                        <td width="10px">
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td> 
                                        @elseif(Researcher::find($currentUser->researcher_id) != null)
                                            @php
                                                $currentRes = Researcher::find($currentUser->researcher_id);
                                            @endphp
                                            @if (in_array($currentRes,$researchers))
                                            <td width="10px">
                                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">
                                                    Editar
                                                </a>
                                            </td>   
                                            @endif
                                        @endif 
                                    @endif        
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                    @endif 
                </div>
                   
            </div>
        </div>
    </div>
</div>
@endsection