@extends('layouts.app')

@section('content')
<section class="container p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4" >
                    Crear Grupo de investigación 
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'investigationGroups.store', 'files' => true]) !!}
                    @include('Investigation_groups.partials.form')
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</section>

@endsection