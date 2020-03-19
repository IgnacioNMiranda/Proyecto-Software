<div class="form-group">
    {{ Form::label('userType','Tipo de Usuario')}}
    {{ Form::label('userType','*', array('class' => 'text-danger'))}}
    {{ Form::select("userType",["Administrador" => "Administrador", "Investigador" => "Investigador"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar tipo']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Correo electrónico') }}
    {{ Form::label('userType','*', array('class' => 'text-danger'))}}
    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
</div>

<div class="form-group">
    {{ Form::label('password', 'Contraseña') }}
    {{ Form::label('userType','*', array('class' => 'text-danger'))}}
    {{ Form::password('password', null, ['class' => 'form-control', 'id' => 'password']) }}
</div>

<div class="form-group mt-4 text-center">
    {{ Form::submit('Guardar', ['class' => 'btn btn-secondary mb-4']) }}
</div>