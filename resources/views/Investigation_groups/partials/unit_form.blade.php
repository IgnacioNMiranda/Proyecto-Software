<section class="modal fade" id="unit_form" tabindex="-1" role="dialog" aria-labelledby="title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Nueva Unidad</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('units.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="country">País</label>
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
            </form>

        </div>
    </div>
</section>