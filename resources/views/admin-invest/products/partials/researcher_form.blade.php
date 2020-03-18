<section class="modal fade" id="researcher_form" tabindex="-1" role="dialog" aria-labelledby="title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Nuevo Investigador</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['route' => ['researchers.store']]) !!}
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        {{ Form::label('passport', 'Número de pasaporte') }}
                        {{ Form::label('passport','*', array('class' => 'text-danger'))}}
                        {{ Form::text('passport', null, ['class' => 'form-control', 'id' => 'rut']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('researcher_name', 'Nombre y apellido') }}
                        {{ Form::label('researcher_name','*', array('class' => 'text-danger'))}}
                        {{ Form::text('researcher_name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label for="country">País</label>
                        {{ Form::label('country','*', array('class' => 'text-danger'))}}
                        <select class="form-control" id="country" name="country">
                            <option disabled selected>Selecciona una opción</option>
                            @php
                            $countries = countries();
                            @endphp
                            @foreach($countries as $clave=>$valor)
                                @php
                                $country = country($clave);
                                @endphp
                                <option value = {{ $country->getName() }}> {{ $country->getName() }} </option>
                            @endforeach
                        </select>
                    </div>
                        
                    <div class = "form-group">
                        {{ Form::label('state','Estado')}}
                        {{ Form::label('state','*', array('class' => 'text-danger'))}}
                        {{ Form::select("state",["Activo" => "Activo", "Inactivo" => "Inactivo"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
                    </div>

                    <div class = "form-group">
                        {{ Form::label('units','Unidad asociada') }}
                        {{ Form::label('units','*', array('class' => 'text-danger'))}}
                        {{ Form::select('unit_id', $units ,null,['class' => 'form-control', 'placeholder'=>'Seleccionar unidad']) }}
                    </div> 

                    <button type="submit" class="btn btn-secondary" value="createNewResearcher" name="researcherButton">{{ __('Crear nuevo Investigador') }}</button>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
</section>