@extends('layouts.app')

@php
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Researcher;
@endphp

@section('content')
<div class ="container mt-4 p-4">
    <div class = "row justify-content-center">
        <div class ="col-md-12 justify-content-center">
            <div class ="card border-secondary shadow">
                <div class ="card-header h2 bg-tertiary">
                    Listado de Productos
                    @auth
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-success float-right">Crear Producto</a>
                    @endauth
                </div>
                
                @if ($products->items() != null)
                    @auth
                    @if(Auth::user()->userType == "Investigador" && Auth::user()->researcher_id != null)
                        @php
                            $currentResearcher = Researcher::find(Auth::user()->researcher_id);
                            //Se obtienen los grupos asociados al investigador conectado
                            $currentProductsids = Researcher::find($currentResearcher->id)->products()->pluck('product_id')->toArray();
                        @endphp
                    @endif    
                    @endauth

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
                                    <th style="width: 5cm">Nombre</th>
                                    <th>Descripcion</th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    @auth
                                    @if(Auth::user()->userType == "Administrador" || in_array($product->id,$currentProductsids))
                                        <td width="10px">
                                            <a href=" {{route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td>
                                        <td width="10px">
                                            {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE'])!!}
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estas seguro que deseas eliminar este producto?')"> 
                                                    Eliminar
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    @else
                                        <td></td><td></td>
                                    @endif
                                    @endauth
                                    @if(Auth::user() == null)
                                        <td></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->render()}}
                    </div>
                @else
                    <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>       
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
