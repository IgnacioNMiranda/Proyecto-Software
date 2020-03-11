@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center bg-tertiary" >
                    Crear Producto
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'products.store']) !!}
                    @include('admin-invest.products.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection