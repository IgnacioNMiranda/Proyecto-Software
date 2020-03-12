@extends('layouts.app')

@section('content')
<section class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary shadow">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Editar Grupo de investigación 
                </div>

                <div class="card-body">
                    {!! Form::model($invGroup, ['route' => ['investigationGroups.update', $invGroup->id],
                    'method' => 'PUT', 'files' => true]) !!}
                        @csrf
                        <div class="form-group">
                            {{ Form::label('name', 'Nombre del grupo') }}
                            {{ Form::label('name','*', array('class' => 'text-danger'))}}
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                        </div>
                        
                        <div class="form-group">
                            <label for="units">Unidad(es) asociada(s)</label>
                            {{ Form::label('units','*', array('class' => 'text-danger'))}}
                            <select id="units" name="units[]" class="selectpicker" multiple data-live-search="true" title="Seleccione unidad(es) asociada(s)">
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"> {{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#unit_form">Crear nueva unidad</a>
                        
                        <div class="form-group">
                            {{ Form::label('logo', 'Logo') }}
                            {{ Form::file('logo') }}
                        </div>
                        
                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-secondary mb-4" name="invGroup">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</section>
@include("\investigation_groups\partials\unit_form")
@endsection