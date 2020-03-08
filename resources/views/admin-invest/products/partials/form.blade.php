<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">

                <div class="panel-body">
                    <div class = "form-group">
                        {{ Form::label('investigation_group_id', "Nombre del Grupo de investigacion")}}
                        {{ Form::select('investigation_group_id', $invGroups, null, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del Producto') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Descripcion del Producto') }}
                        {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    <div class = "form-group">
                        {{ Form::label('researcher', "Nombre de los Investigadores")}}
                        {{ Form::select('researcher', $researchers, null, ['class' => 'form-control'])}}
                    </div>
                    <div class = "form-group">
                        {{ Form::label('Fecha', 'Fecha de Creacion') }}
                        <input type="date" name="Fecha" disabled value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="form-group">
                        {{ Form::label('project_id', "Nombre del Proyecto asociado")}}
                        {{ Form::select('project_id', $projects, null, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Crear Producto', ['class' => 'btn btn-secondary']) }}
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    })
</script>