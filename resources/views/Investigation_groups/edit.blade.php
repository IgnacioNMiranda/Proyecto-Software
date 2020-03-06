@extends('layouts.app')

@section('content')
<section class="container p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h4 d-flex justify-content-center mb-4">
                    Editar Grupo de investigación 
                </div>

                <div class="panel-body">
                    {!! Form::model($invGroup, ['route' => ['investigationGroups.update', $invGroup->id], 
                    'method' => 'PUT',  'files' => true]) !!}
                    @include('Investigation_groups.partials.form')
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</section>

@endsection