<section class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 border shadow pt-4">
      <div class="panel panel default">
        <div class="panel-body">
          <div class="form-group">
            {{ Form::label('investigation_group_id', "Nombre del Grupo de investigación") }}
            {{ Form::select('investigation_group_id', $investigation_groups, null, 
                      ['class' => 'form-control','placeholder' => 'Seleccione grupo de investigación', 'id' => 'investigation_group_id']) }}
          </div>

          <div class="form-group">
            {{ Form::label('code', 'Código') }}
            {{ Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) }}
          </div>

          <div class="form-group">
            {{ Form::label('name', 'Nombre del Proyecto (*)') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
          </div>

          <div class="form-group">
            {{ Form::label('state','Estado') }}
            {{ Form::select('state', array('Postulado' => 'Postulado','En Ejecucion' => 'En Ejecucion','Finalizado' => 'Finalizado','Cancelado' =>'Cancelado') ,null,
              ['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }} 
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
            {{ Form::label('startDate', 'Fecha de Creación') }}
            <input type="date" name="startDate" id="startDate" readonly value="<?php echo date("Y-m-d");?>">
          </div>

          <div class="form-group">
            {{ Form::label('endDate', 'Fecha de Término') }}
            <input type="date" name="endDate" id="endDate" min ="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>">
          </div>

          <div class="form-group mt-4 d-flex justify-content-center">
            {{ Form::submit('Crear Proyecto', ['class' => 'btn btn-secondary']) }}
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<div class="m-5 pb-5"></div>

