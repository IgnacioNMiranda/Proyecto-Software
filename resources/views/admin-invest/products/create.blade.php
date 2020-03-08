@extends('layouts.app')

@section('content')
<section class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class = "panel-heading h4" >
                    Crear Producto
                </div>

                <div class="panel-body">
                    {{!! Form:open(['route' => 'products.store']!!}}
                        @include(admin-invest.products.partials.form')
                    {!!Form_close()!!}

                </div>


            </div>
        </div>
    </div>
</section>
@endsection