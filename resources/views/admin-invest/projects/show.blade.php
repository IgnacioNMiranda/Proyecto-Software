@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "card border-secondary">
                <div class = "card-header h4" >
                    Ver Proyecto 
                </div>

                <div class="card-body">
                    <p><strong>Id</strong> {{$project->id}}</p>
                    <p><strong>Nombre</strong> {{$project->id}}</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection