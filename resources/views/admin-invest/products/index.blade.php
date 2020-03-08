@extends('layouts.app')

@section('content')
<div class ="container">
    <div class = "row">
        <div class ="col-md-8 col-md-offset-2">
            <div class ="panel panel-default">
                <div class ="panel-heading">
                    Lista de Productos
                    <a href="{{ route('products.create')}}"
                    class="btn btn.sm btn-primary pull-right"
                        Crear
                    </a>
                </div>
            

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id}}</td>
                                <td>{{ $tag->name}}</td>
                                <td width="10px">
                                    <a href=" {{route('products.show', $product->id) }}" class="btn btn-sm btn-default">
                                        ver
                                    </a>
                                </td>
                                <td>{{ $product->id}}</td>
                                <td>{{ $tag->name}}</td>
                                <td width="10px">
                                    <a href=" {{route('products.edit', $product->id) }}" class="btn btn-sm btn-default">
                                        edit
                                    </a>
                                </td>
                                <td width="10px">
                                    Eliminar
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection