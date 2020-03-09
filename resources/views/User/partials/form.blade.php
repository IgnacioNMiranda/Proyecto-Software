<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class="panel-body">
                    <div class = "form-group">
                        {{ Form::label('userType','Tipo de Usuario')}}
                        {{ Form::select("userType",["Investigador" => "Investigador", "Administrador" => "Administrador"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('email', 'Correo electronico') }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Contraseña') }}
                        {{ Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) }}
                    </div>

                    <div class = "form-group mt-4">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>    

</div>