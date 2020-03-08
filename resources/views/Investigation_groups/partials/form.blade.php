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
                        {{ Form::label('units', 'Unidad(es) asociada(s)') }}
                        {{ Form::select('units[]', $units, null, ['id' => 'units', 'multiple' => 'multiple']) }}
                    </div>

                    <a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#unit_form">Crear nueva unidad</a>

                    <div class="form-group mt-2">
                        {{ Form::label('logo', 'Logo') }}
                        {{ Form::file('logo')}}
                    </div>

                    <div class="form-group mt-4 d-flex justify-content-center">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@include("\investigation_groups\partials\unit_form")