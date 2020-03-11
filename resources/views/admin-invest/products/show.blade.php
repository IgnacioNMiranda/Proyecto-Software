@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "card border-secondary">
                <div class = "card-header h4" >
                    Ver Producto
                </div>

                <div class="panel-body">
                    <p><strong>Nombre</strong> {{$product->name}}</p>
                    <p><strong>Slug</strong> {{$product->slug}}</p>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection