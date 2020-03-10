@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4" >
                    Lista Proyectos
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 3.5cm;">ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Estado</th>
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
                                <td width="10px">
                                    <a href="#" class="btn btn-sm btn-default">
                                        ver    
                                    </a>    
                                </td>
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
</div>

<div class="m-5 pb-5"></div>
@endsection
