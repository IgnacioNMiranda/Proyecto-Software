@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4" >
                    Lista Investigadores
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 3.5cm;">ID</th>
                                <th>Nombre</th>
                                <th colspan="2">&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchers as $researcher)
                            <tr>
                                <td> {{ $researcher->rut }} </td> 
                                <td> {{ $researcher->researcher_name }} </td> 
                                <td width="10px">
                                    <a href="#" class="btn btn-sm btn-default">
                                        ver    
                                    </a>    
                                </td>
                                <td width="10px">
                                    <a href="{{ route('researchers.edit', $researcher->id) }}" class="btn btn-sm btn-default">
                                        editar    
                                    </a>    
                                </td>       
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{ $researchers->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection