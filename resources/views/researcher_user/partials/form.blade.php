<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "card">
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('passport', 'Número de pasaporte') }}
                        {{ Form::text('passport', null, ['class' => 'form-control', 'id' => 'rut']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('researcher_name', 'Nombre') }}
                        {{ Form::text('researcher_name', null, ['class' => 'form-control']) }}
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
                        
                    <div class = "form-group">
                        {{ Form::label('state','Estado')}}
                        {{ Form::select("state",["Activo" => "Activo", "Inactivo" => "Inactivo"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
                    </div>
                        
                    <div class = "form-group">
                        {{ Form::label('units','Unidad asociada') }}
                        {{ Form::select('unit_id', $units ,null,['class' => 'form-control', 'placeholder'=>'Seleccionar unidad']) }}
                    </div>    

                    <div class = "form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>