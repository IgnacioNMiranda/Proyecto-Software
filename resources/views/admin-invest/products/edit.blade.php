@extends('layouts.app')

@section('content')
<section class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class = "panel-heading h4" >
                    Editar Producto
                </div>

                <div class="panel-body">
                    {!! Form::model($product, ['route' => 'products.update', $product->id],
                        'method'=> 'PUT'])!!}
                        @include(admin-invest.products.partials.form')
                    {!!Form_close()!!}

                </div>


            </div>
        </div>
    </div>
</section>
@endsection