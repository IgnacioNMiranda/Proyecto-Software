@extends('layouts.app')
@php
use App\Unit;
use App\Researcher;
@endphp


@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-12 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 bg-tertiary">
                    Listado de Productos Asociados
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:1cm">ID</th>
                                <th width ="14cm">Nombre</th>
                                <th style= "width:1cm">Descripción</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                @if ($product->investigation_group_id == $id)
                                    <td> {{ $product->id }} </td>
                                    <td> {{ $product->name }}</td> 
                                    <td> {{ $product->description }}</td>
                                    @if ($currentUser->userType == "Administrador")
                                    <td width="10px">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary">
                                            Editar
                                        </a>
                                    </td> 
                                    @elseif(Researcher::find($currentUser->researcher_id) != null)
                                        @php
                                            $currentRes = Researcher::find($currentUser->researcher_id);
                                        @endphp
                                        @if (in_array($currentRes,$researchers))
                                        <td width="10px">
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td>   
                                        @endif
                                    @endif        
                                @endif 
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection