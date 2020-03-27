@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-secondary shadow">
                <div class="card-header h4">
                    {{$project->name}}
                </div>
                <div class="card-body">
                    <p><strong>Id:</strong> {{$project->id}}</p>
                    <p><strong>Codigo:</strong> {{$project->code}}</p>
                    <p><strong>Nombre:</strong> {{$project->name}}</p>
                    <p><strong>Estado:</strong> {{$project->state}}</p>
                    <p><strong>Fecha de Inicio:</strong> {{ date('d-m-Y', strtotime($project->startDate)) }}</p>
                    <p><strong>Fecha de Finalización:</strong> {{ date('d-m-Y', strtotime($project->endDate)) }}</p>
                    <p><strong>Id del Grupo de Investigación:</strong> {{$project->investigation_group_id}}</p>
                    <div class="form-group">
                        {{ Form::label('id','Investigador(es) participante(s)')}}
                        {{Form::select('id[]',$projectResearchers,null, ['class'=>'form-control', 'multiple' => true,'id' => 'researchers_id2','name' => 'researchers_name2'])}}
                      </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection