@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row">
        <div class = "col-md-8 col-md-offset-3">
            <div class = "panel panel-default">
                <div class = "panel-heading">
                    <div class="bg bg-tertiary mb-4 border border-primary">
                        <p class="font-weight-bold text-dark pt-2 h5 text-center">Grupos de investigación</p>
                    </div>
                </div>

                <div class="panel-body">
                    <div class = "form-group">
                        <label for="Grupo">Grupo de Investigacion</label>
                        <select name="" id=""></select>

                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del Producto') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Descripcion del Producto') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    <div class = "form-group">
                        <label for="Investigadores">Nombres de los Investigadores</label>
                        <select name="" id=""></select>

                    </div>
                    <div class = "form-group">
                        {{ Form::label('Fecha', 'Fecha de Creacion') }}
                        <input type="date" name="Fecha" disabled value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class = "form-group">
                        <label for="Proyecto">Proyecto Asociado</label>
                        <select name="" id=""></select>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection