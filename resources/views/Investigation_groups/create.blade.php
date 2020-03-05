@extends('layouts.app')

@section('content')
<section class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
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