@extends('layouts.app')

@section('content')
<section class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Crear Proyecto
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'projects.store']) !!}
                    @include('admin-invest.projects.partials.form')
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</section>

@endsection