<div class = "container">
    <div class = "row">
        <div class = "col-md-8 col-md-offset-2">
            <div class = "panel panel default">
                <div class = "panel-heading" >
                    Crear Usuario 
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del usuario') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>

                    <div class = "form-group">
                        <label for="Rol">Tipo de Usuario</label>
                        <select name="" id=""></select>

                    </div>
                </div>
            </div>
        </div>
    </div>    

</div>