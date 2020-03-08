<div class="modal fade" id="unit_form" tabindex="-1" role="dialog" 
aria-labelledby="title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">Nueva Unidad</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <div id="name">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
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
                            <option> {{ $country->getName() }} </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-secondary d-flex justify-content-center">Crear nueva unidad</button>
                </form>
            </div>
        </div>
    </div>
</div>