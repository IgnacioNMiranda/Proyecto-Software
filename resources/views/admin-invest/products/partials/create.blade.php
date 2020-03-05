@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class = "panel-heading h4" >
                    Crear Producto
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