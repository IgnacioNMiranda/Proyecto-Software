@extends('layouts.app')

@section('content')
@php
use App\Unit;
use App\User;
@endphp

<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card border-secondary shadow">
                <div class="card-header h2 bg-tertiary">
                    Listado Investigadores
                    <a href="{{ route('researchers.create') }}" class="btn btn-sm btn-success float-right">Crear nuevo
                        investigador</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            @php
                                $countries = countries();
                                $paises = array();
                            @endphp
                            @foreach ($countries as $clave=>$valor)
                                @php
                                    $country = country($clave);
                                    $paises[$country->getName()] = $country->getName();
                                @endphp
                            @endforeach

                            {!! Form::open(['route' => 'researchers.store','method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search'])!!}
                                <div class="form-group">
                                    {{ Form::text('country',null,['class' => 'form-control','placeholder'=>'País']) }}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </div>
                            {!! Form::close()!!}
                        </div>
                        <div class="col-sm-12 col-md-4">
                            {!! Form::open(['route' => 'researchers.store','method' =>'GET','class' =>'navbar
                            navbar-light bg-light','role' => 'search'])!!}
                                <div class="form-group">
                                    {!! Form::text('unit',null,['class'=>'form-control','placeholder'=>'Unidad']) !!}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </div>
                            {!! Form::close()!!}
                        </div>
                    </div>

                    @if ($researchers->items() != null)
                        <div class="table-responsive-md">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5cm;">Nombre</th>
                                        <th style="width: 3.5cm;"> País</th>
                                        <th>Unidad</th>
                                        <th colspan="2">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchers as $researcher)
                                    <tr>
                                        <td> {{ $researcher->researcher_name }} </td>
                                        <td> {{ $researcher->country }} </td>
                                        <td>
                                            @php
                                                $unit = Unit::find($researcher->unit_id);
                                            @endphp 
                                            {{ $unit->name}}
                                        </td>
                                        
                                        @auth
                                        @if (Auth::user()->userType == "Administrador" && !$researcher->user)
                                            <td width="10px">
                                                <a href="{{ route('createResearcherAccount', $researcher->id) }}"
                                                    class="btn btn-sm btn-secondary">
                                                    Crear cuenta
                                                </a>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
                                        @endauth

                                        <td width="10px">
                                            <a href="{{ route('researchers.edit', $researcher->id) }}"
                                                class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $researchers->render() }}
                        </div>
                    @else
                        <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
