@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 border shadow pt-4">
            <div class="card border-secondary">
                <div class="card-header h4">
                    Ver Proyecto: {{$project->name}}
                </div>
                <div class="card-body">
                    <p><strong>Id:</strong> {{$project->id}}</p>
                    <p><strong>Codigo:</strong> {{$project->code}}</p>
                    <p><strong>Nombre:</strong> {{$project->name}}</p>
                    <p><strong>Estado:</strong> {{$project->state}}</p>
                    <p><strong>Fecha de Inicio:</strong> {{ date('d-m-Y', strtotime($project->startDate)) }}</p>
                    <p><strong>Fecha de Finalización:</strong> {{ date('d-m-Y', strtotime($project->endDate)) }}</p>
                    <p><strong>Id el Grupo de Investigación:</strong> {{$project->investigation_group_id}}</p>
                    <div class="form-group mt-4 d-flex justify-content-center">
                        <td width="10px">
                            <a href="{{ route('projects.index', $project->id) }}" class="btn btn-sm btn-secondary">
                                Volver
                            </a>
                        </td>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection