<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "panel panel default">
                    <div class="panel-body">
                        <div class="form-group">
                            {{ Form::label('rut', 'Rut') }}
                            {{ Form::text('rut', null, ['class' => 'form-control', 'id' => 'rut']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('name', 'Nombre') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                        </div>

                        <div class = "form-group">
                            <label for="country">País</label>
                            <select class="form-control" id="country">
                                <option disabled selected>Selecciona una opción</option>
                                @php
                                $countries = countries();
                                @endphp
                                @foreach($countries as $clave=>$valor)
                                    @php
                                    $country = country($clave);
                                    @endphp
                                   <option>  {{ $country->getName() }} </option>
                                @endforeach

                            </select>
                        </div>
                        
                        <div class = "form-group">
                            <label for="state">Estado</label>
                            <select class="form-control" id="state">
                                <option disabled selected>Selecciona una opción</option>
                                <option>Activo</option>
                                <option>Inactivo</option> 
                            </select>
                        </div>
                        
                        <div class = "form-group mt-4 d-flex justify-content-center">
                            {{ Form::submit('Crear investigador', ['class' => 'btn btn-secondary']) }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>