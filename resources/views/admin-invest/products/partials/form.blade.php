<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class = "panel-heading h4" >
                    Crear Producto
                </div>

                <div class="panel-body">
                    <div class = "form-group">
                        <label for="invGroups">Grupo de Investigacion</label>
                        <select class="selectpicker form-control" multiple id="invGroups"
                            title="Seleccione Investigador(es)" data-selected-text-format="count > 2" data-live-search="true">
                            @foreach ($InvestigationGroup as $InvestigationGroup)
                            <option>{{ $InvestigationGroup->name }}</option>
                            @endforeach
                        </select>

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
                        <label for="researchers">Nombres de los Investigadores</label>
                        <select class="selectpicker form-control" multiple id="researchers"
                            title="Seleccione Investigador(es)" data-selected-text-format="count > 2" data-live-search="true">
                            @foreach ($researchers as $Researcher)
                            <option>{{ $Researcher->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class = "form-group">
                        {{ Form::label('Fecha', 'Fecha de Creacion') }}
                        <input type="date" name="Fecha" disabled value="<?php echo date("Y-m-d");?>">
                    </div>
                    <div class="form-group">
                        <label for="projects">Proyecto Asociado</label>
                        <select class="selectpicker form-control" multiple id="projects"
                            title="Seleccione Proyecto(s) Asociado(s)" data-selected-text-format="count > 2" data-live-search="true">
                            @foreach ($projects as $Project)
                            <option>{{ $Project->name }}</option>
                            @endforeach
                        </select>
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