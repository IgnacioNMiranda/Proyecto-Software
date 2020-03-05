<section class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class = "panel-heading h4" >
                    Crear Grupo de investigación 
                </div>

                <div class="panel-body">
                    <div class = "form-group">
                        <label for="Rol">Tipo de Usuario</label>
                        <select class="form-control" id="Rol">
                            <option disabled selected>Selecciona una opción</option>
                            <option>Administrador</option>
                            <option>Investigador</option>
                        </select>
                    </div>


                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::text('logo', null, ['class' => 'form-control', 'id' => 'logo']) }}
                    </div>

                    <div class = "form-group mt-4">
                        {{ Form::submit('Crear', ['class' => 'btn btn-sm btn-primary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>