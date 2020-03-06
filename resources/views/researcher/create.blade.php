@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4" >
                    Crear Investigador 
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'researchers.store']) !!}
                    @include('researcher.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection