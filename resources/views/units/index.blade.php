@extends('layouts.app')
@php
use Illuminate\Support\Facades\Auth;
use App\Researcher;
@endphp
@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary shadow">
                <div class = "card-header h2 bg-tertiary">
                    Listado de unidades
                    @auth
                    <a href="{{ route('units.create') }}" class="btn btn-sm btn-success  float-right">Crear nueva unidad</a>
                    @endauth
                </div>

                <div class="card-body">
                    @auth
                    @if(Auth::user()->userType == "Investigador" && Auth::user()->researcher_id != null)
                        @php
                            $currentResearcher = Researcher::find(Auth::user()->researcher_id);
                        @endphp
                    @endif    
                    @endauth
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 6cm;">Nombre</th>
                                <th>País</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                            <tr>
                                <td> {{ $unit->name }} </td> 
                                <td> {{ $unit->country }} </td>
                                @auth
                                @if(Auth::user()->userType == "Administrador" || $currentResearcher->unit_id == $unit->id)
                                <td width="10px">
                                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-secondary">
                                        Editar
                                    </a>    
                                </td>
                                @else
                                    <td></td>
                                @endif
                                @endauth
                                @if(Auth::user() == null)
                                    <td></td>
                                @endif 
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{ $units->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection