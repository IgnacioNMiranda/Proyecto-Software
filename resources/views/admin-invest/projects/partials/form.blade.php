<div class="form-group">
  {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
  {{ Form::label('invesigation_group_id','*', array('class' => 'text-danger'))}}
  {{ Form::select('investigation_group_id', $investigation_groups, null, 
                      ['class' => 'form-control','placeholder' => 'Seleccione grupo de investigación', 'id' => 'investigation_group_id']) }}
</div>

<div class="form-group">
  {{ Form::label('code', 'Código') }}
  {{ Form::label('code','*', array('class' => 'text-danger'))}}
  {{ Form::text('code', null, ['class' => 'form-control', 'id' => 'code']) }}
</div>

<div class="form-group">
  {{ Form::label('name', 'Nombre del Proyecto') }}
  {{ Form::label('name','*', array('class' => 'text-danger'))}}
  {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
  {{ Form::label('state','Estado') }}
  {{ Form::label('state','*', array('class' => 'text-danger'))}}
  {{ Form::select('state', array('Postulado' => 'Postulado','En Ejecucion' => 'En Ejecucion','Finalizado' => 'Finalizado','Cancelado' =>'Cancelado') 
                ,null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
</div>

<div class="form-group">
  {{ Form::label('researchers','Investigador(es) asociado(s) del grupo de investigación')}}
  {{ Form::label('researchers','*', array('class' => 'text-danger'))}}
  {{Form::select('researchers[]',$researchers,null, ['class'=>'form-control', 'multiple' => true, 'id' => 'researchers_id'])}}
</div>

<div class="form-group">
  {{ Form::label('researchers','Investigador(es) asociado(s)')}}
  {{Form::select('researchers[]',$researchers,null, ['class'=>'form-control', 'multiple' => true,'id' => 'researchers_id'])}}
</div>

<div class="form-group">
  {{ Form::label('startDate', 'Fecha de Creación') }}
  {{ Form::label('startDate','*', array('class' => 'text-danger'))}}
  <input type="date" name="startDate" id="startDate" max="<?php echo date("Y-m-d");?>"
    value="<?php echo date("Y-m-d");?>">
</div>

<div class="form-group">
  {{ Form::label('endDate', 'Fecha de Término ') }}
  {{ Form::label('endDate','*', array('class' => 'text-danger'))}}
  <input type="date" name="endDate" id="endDate" min="<?php echo date("Y-m-d");?>" value="<?php echo date("Y-m-d");?>">
</div>

<div class="form-group mt-4 d-flex justify-content-center">
  {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
</div>