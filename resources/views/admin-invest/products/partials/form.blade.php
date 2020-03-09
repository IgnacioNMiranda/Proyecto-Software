<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del Producto') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    <div class = "form-group">
                        {{ Form::label('investigation_group_id', "Nombre del Grupo de investigacion") }}
                        {{ Form::select('investigation_group_id', $invGroups, null, 
                            ['placeholder' => 'Seleccione Grupo de investigacion...'], ['multiple' => 'multiple'], 
                                ['class' => 'form-control', 'id' => 'investigation_group_id']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Descripcion del Producto') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                    </div>
                    <div class="form-group">
                            <label for="researchers">Investigador(es) Asociado(s)</label>
                            <select id="researchers" name="researchers[]" class="selectpicker" multiple data-live-search="true" title="Seleccione Investigador(es) asociado(s)">
                                @foreach ($researchers as $researcher)
                                    <option value="{{ $researcher->id }}"> {{ $researcher->name }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class = "form-group">
                        {{ Form::label('date', 'Fecha de Creacion') }}
                        <input type="date" name="date" disabled value="<?php echo date("Y-m-d");?>">  
                    </div>
                    <div class="form-group">
                        {{ Form::label('project_id', "Nombre del Proyecto asociado (opcional)") }}
                        {{ Form::select('project_id', $projects, null, ['placeholder' => 'Seleccione Proyecto asociado...'], 
                            ['class' => 'form-control', 'id' => 'project_id']) }}
                    </div>
                    <div class="form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Crear Producto', ['class' => 'btn btn-secondary']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>