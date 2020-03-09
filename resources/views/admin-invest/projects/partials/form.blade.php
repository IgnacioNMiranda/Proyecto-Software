<section class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 border shadow pt-4">
      <div class="panel panel default">
        <div class="panel-body">
          <form action=" {{ route('projects.store')}}" method="POST">

            <div class="form-group">
              <label for="investigation_groups">Grupo de Investigador Asociado</label>
              <select class="form-control" id="investigation_groups">
                <option selected>Seleccionar Grupo de Investigacion...</option>
                @foreach ($investigation_groups as $investigation_group)
                <option value="{{ $investigation_group->id }}"> {{ $investigation_group->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              {{ Form::label('code', 'Codigo') }}
              {{ Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) }}
            </div>

            <div class="form-group">
              {{ Form::label('name', 'Nombre del Proyecto (*)') }}
              {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>

            <div class="form-group">
                <label class=" mr-sm-2" for="inlineFormCustomSelect">Estado</label>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Seleccionar Estado...</option>
                <option value="1">Postulado</option>
                <option value="2">En Ejecucion</option>
                <option value="3">Finalizado</option>
                <option value="4">Cancelado</option>
              </select>
            </div>

            <div class="form-group">
              <label for="researchers">Investigador(es) asociado(s)</label>
              <select id="researchers" name="researchers[]" class="selectpicker" multiple data-live-search="true"
                title="Seleccione Investigador(es) Asociado(s)">
                @foreach ($researchers as $researcher)
                <option value="{{ $researcher->id }}"> {{ $researcher->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              {{ Form::label('startDate', 'Fecha de Creacion') }}
              <input type="date" name="startDate" id="startDate" disabled value="<?php echo date("Y-m-d");?>">
            </div>

            <div class="form-group">
              {{ Form::label('endDate', 'Fecha de Termino') }}
              <input type="date" name="endDate" id="endDate" value="<?php echo date("Y-m-d");?>">
            </div>

            <div class="form-group mt-4 d-flex justify-content-center">
              <button type="submit" class="btn btn-secondary mb-4" name="button">
                {{ __('Guardar') }}
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="m-5 pb-5"></div>