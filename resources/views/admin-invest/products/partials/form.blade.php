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
                                ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo de investigacion', 'id' => 'investigation_group_id']) }}
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
                        {{ Form::date('date', \Carbon\Carbon::now(), ['readonly'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('project_id', "Nombre del Proyecto asociado (opcional)") }}
                        {{ Form::select('project_id', $projects, null, 
                            ['class' => 'form-control', 'placeholder' => 'Seleccione Proyecto asociado', 'id' => 'project_id']) }}
                    </div>
                    <div class="form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Crear Producto', ['class' => 'btn btn-secondary']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-5 pb-5"></div>