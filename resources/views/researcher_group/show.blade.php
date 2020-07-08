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
                    Listado de Investigadores Asociados
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

                            {!! Form::open(['route' => ['researchers_groups.index'],'method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search'])!!}
                                <div class="form-group">
                                    {{ Form::text('country',null,['class' => 'form-control','placeholder'=>'País']) }}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                                </div>
                            {!! Form::close()!!}
                        </div>

                        <div class="col-sm-12 col-md-4">
                            {!! Form::open(['route' => ['researchers_groups.index'],'method' =>'GET','class' =>'navbar
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
                   
                    @if (!empty($researchers))
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
                                @if ($currentUser != null)
                                    @if ($currentUser->userType == "Administrador")                                  
                                        @if (!$researcher->user)
                                            <td width="10px">
                                                <a href="{{ route('createResearcherAccount', $researcher->id) }}"
                                                    class="btn btn-sm btn-secondary">
                                                    Crear cuenta
                                                </a>
                                            </td>
                                        @else
                                            <td></td>
                                        @endif
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
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
