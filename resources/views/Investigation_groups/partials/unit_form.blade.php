<section class="modal fade" id="unit_form" tabindex="-1" role="dialog" aria-labelledby="title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Nueva Unidad</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['route' => ['units.store']]) !!}
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        {{ Form::label('name', 'Nombre') }}
                        {{ Form::label('name','*', array('class' => 'text-danger'))}}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
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

                    <button type="submit" class="btn btn-secondary" value="createNewUnit" name="unitButton">{{ __('Crear nueva unidad') }}</button>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
</section>