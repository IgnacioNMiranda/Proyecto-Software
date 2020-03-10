<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>

                    <div class = "form-group">
                            @php
                            $countries = countries();
                            $paises = array();
                            @endphp
                            @foreach ($countries as $clave=>$valor)
                                @php
                                $country = country($clave);    
                                $paises[$country->getName()] = $country->getName();
                                @endphp
                            @endforeach
                            {{ Form::label('country','País') }}
                            {{ Form::select("country",$paises,null,['class' => 'form-control','placeholder'=>'Seleccionar país']) }}
                    </div> 

                    <div class = "form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>