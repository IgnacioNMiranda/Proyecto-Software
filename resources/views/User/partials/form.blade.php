<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class="panel-body">
                    <div class = "form-group">
                        {{ Form::label('userType','Tipo de Usuario')}}
                        {{ Form::select("userType",["Administrador" => "Administrador", "Investigador" => "Investigador"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar tipo']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico') }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Contraseña') }}
                        {{ Form::password('password', null, ['class' => 'form-control', 'id' => 'password']) }}
                    </div>

                    <div class = "form-group mt-4 text-center">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-secondary mb-4']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>    

</div>