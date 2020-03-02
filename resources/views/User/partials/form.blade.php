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
                </div>
            </div>
        </div>
    </div>    

</div>