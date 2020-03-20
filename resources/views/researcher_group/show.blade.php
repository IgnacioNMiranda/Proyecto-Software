@extends('layouts.app')
@php
use App\Unit;
use App\Researcher;
@endphp


@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 bg-tertiary">
                    Listado de Investigadores Asociados
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 6cm;">Nombre</th>
                                <th style="width 6cm;">País</th>
                                <th style="width 6cm;">Unidad</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchers as $researcher)
                            <tr>
                                <td> {{ $researcher->researcher_name }} </td>
                                <td> {{ $researcher->country }}</td> 
                                <td> 
                                    @php
                                    $unit = Unit::find($researcher->unit_id);    
                                    @endphp
                                    {{ $unit->name }}
                                </td>
                                @if ($currentUser->userType == "Administrador")
                                <td width="10px">
                                    <a href="{{ route('researchers.edit', $researcher->id) }}" class="btn btn-sm btn-secondary">
                                        Editar
                                    </a>
                                </td> 
                                @elseif(Researcher::find($currentUser->researcher_id) != null)
                                    @php
                                        $currentRes = Researcher::find($currentUser->researcher_id);
                                    @endphp
                                    @if (in_array($currentRes,$researchers))
                                    <td width="10px">
                                        <a href="{{ route('researchers.edit', $researcher->id) }}" class="btn btn-sm btn-secondary">
                                            Editar
                                        </a>
                                    </td>   
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