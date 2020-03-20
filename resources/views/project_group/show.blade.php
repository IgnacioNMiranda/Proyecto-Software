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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:1cm">ID</th>
                                <th width ="14cm">Nombre</th>
                                <th style= "width:1cm">Estado</th>
                                <th style= "width:3cm">Fecha de Inicio</th>
                                <th style= "width:3cm">Fecha de Termino</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                @if ($project->investigation_group_id == $id)
                                    <td> {{ $project->id }} </td>
                                    <td> {{ $project->name }}</td> 
                                    <td> {{ $project->state }}</td>
                                    <td>{{ date('d-m-Y', strtotime($project->startDate)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($project->endDate)) }}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection