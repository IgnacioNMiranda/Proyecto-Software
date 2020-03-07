<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 border shadow pt-4">
            <div class="panel panel default">
                <div class="panel-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del grupo') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>
                    
                    <div class="form-group">
                        <label for="units">Unidad(es) asociada(s)</label>
                        <select class="selectpicker form-control" multiple id="units"
                            title="Seleccione unidad(es) asociada(s)" data-selected-text-format="count > 2" data-live-search="true">
                            @foreach ($units as $unit)
                            <option>{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo')}}
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Crear grupo', ['class' => 'btn btn-secondary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function () {
        $('.selectpicker').selectpicker();
    })
</script>