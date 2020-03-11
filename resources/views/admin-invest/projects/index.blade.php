@extends('layouts.app')

@section('content')
<div class="container mt-6 p-6">
    <div class="row justify-content-center">
        <div class="col-md-15 justify-content-center">
            <div class="card-header">
                Lista Proyectos
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 1cm;">ID</th>
                            <th style="width: 5cm;">Codigo</th>
                            <th style="width: 10cm;">Nombre</th>
                            <th style="width: 3cm;">Estado</th>
                            <th style="width: 3cm;">Fecha de Inicio</th>
                            <th style="width: 3cm;">Fecha de Finalización</th>
                            <th style="width: 1cm;">ID Grupo de Investigación</th>
                            <th colspan="3">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td> {{ $project->id }} </td>
                            <td> {{ $project->code }} </td>
                            <td> {{ $project->name }} </td>
                            <td> {{ $project->state }} </td>
                            <td> {{ $project->startDate }} </td>
                            <td> {{ $project->endDate }} </td>
                            <td> {{ $project->investigation_group_id }} </td>
                            <td width="10px">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-default">
                                    editar
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $projects->render() }}
            </div>
        </div>
    </div>
</div>


<div class="m-5 pb-5"></div>
@endsection