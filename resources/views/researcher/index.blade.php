@extends('layouts.app')

@section('content')
@php
use App\Unit;
@endphp

<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card border-secondary">
                <div class="card-header h2 bg-tertiary">
                    Listado Investigadores
                    <a href="{{ route('researchers.create') }}" class="btn btn-sm btn-success float-right">Crear nuevo
                        investigador</a>
                </div>



                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
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
                                {{-- {!! Form::text('country',null,['class'=>'form-control','placeholder'=>'Pais']) !!} --}}
                                 {{ Form::text('country',null,['class' => 'form-control','placeholder'=>'Seleccionar país']) }}

                                </div>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                {!! Form::close()!!}

                            </div>

                            <div class="col-md-4">
                                {!! Form::open(['route' => 'researchers.store','method' =>'GET','class' =>'navbar
                                navbar-light bg-light','role' => 'search'])!!}
                                <div class="form-group">
                                {!! Form::text('unit',null,['class'=>'form-control','placeholder'=>'Unidad']) !!}
                                </div>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                {!! Form::close()!!}

                            </div>
                        </div>
                    </div>
                {{-- @php
                    $ActiveResearcher = 0;
                @endphp
                @foreach ($researchers as $researcher)
                    @if ($researcher->state == "Activo")
                        @php
                            $ActiveResearcher += 1;
                            break;
                        @endphp
                    @endif
                @endforeach --}}





                    {{-- @if ($ActiveResearcher == 1) --}}
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
                                        @endphp {{ $unit->name}}
                                    </td>

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
                    {{-- @else
                        <p class="h1 text-center mt-4"> No se encontraron coincidencias </p> --}}
                    {{-- @endif --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
