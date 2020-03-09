@extends('layouts.app')

@section('content')
<section class="container p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center border shadow">   
            <div class="panel panel-default">
                <div class = "panel-heading h2 d-flex justify-content-center mb-4 mt-2" >
                    Crear Grupo de investigación 
                </div>

                <div class="panel-body">
                    <form action=" {{ route('investigationGroups.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nombre del grupo</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label for="units">Unidad(es) asociada(s)</label>
                            <select id="units" name="units[]" class="selectpicker" multiple data-live-search="true" title="Seleccione unidad(es) asociada(s)">
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"> {{ $unit->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#unit_form">Crear nueva unidad</a>

                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" id="logo" name="logo" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        
                        <div class="form-group mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary mb-4" name="invGroup">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
@include("\investigation_groups\partials\unit_form")
@endsection