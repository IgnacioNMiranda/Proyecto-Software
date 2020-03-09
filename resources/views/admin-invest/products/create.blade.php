@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4" >
                    Crear Producto
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'products.store']) !!}
                    @include('admin-invest.products.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection