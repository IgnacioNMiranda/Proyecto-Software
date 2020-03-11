@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-9 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Editar Producto
                </div>

                <div class="panel-body">
                    {!! Form::model($product, ['route' => ['products.update', $product->id],
                        'method'=> 'PUT'])!!}
                        @include('admin-invest.products.partials.form')
                    {!! Form::close() !!}

                </div>


            </div>
        </div>
    </div>
</section>
@endsection