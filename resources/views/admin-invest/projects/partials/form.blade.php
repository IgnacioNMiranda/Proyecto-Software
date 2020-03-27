<div class="form-group">
  {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
  {{ Form::label('investigation_group_id','*', array('class' => 'text-danger'))}}
  {{ Form::select('investigation_group_id', $investigation_groups, null, 
  ['class' => 'form-control','placeholder' => 'Seleccione grupo de investigación','id' => 'investigation_group_id']) }}
</div>
{{-- Las cosas que necesitan id son solo los que van a ser dinamicos, por eso se eleimina en el select anterior--}}
{{-- Se le pone el atributo name a los input que se van a mandar al controlador --}}
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
  {{ Form::label('state','Estado del proyecto') }}
  {{ Form::label('state','*', array('class' => 'text-danger'))}}
  {{ Form::select('state',config('options.states'),null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
</div>

<!-- Investigadores elegidos que son del grupo de investigación seleccionado-->
<div class="form-group">
  {{ Form::label('researchers[]','Investigador(es) participante(s)')}}
  {{ Form::label('researchers[]','*', array('class' => 'text-danger'))}}
  {{Form::select('researchers[]', ['placeholder' => 'Seleccione investigador(es)'], null, ['class'=> 'form-control', 'multiple' => 'multiple', 'id' => 'researchers'])}}
</div>

<!-- Posibles investigadores elegidos que son externos al grupo de investigación seleccionado-->
<div class="form-group">
  {{ Form::label('notResearchers[]','Investigador(es) Asociado(s) externos al grupo de investigación')}}
  {!! Form::select('notResearchers[]', ['placeholder' => 'Seleccione investigador(es)'], null, 
  ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'notResearchers']) !!}
</div>

<a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#researcher_form">Crear nuevo Investigador</a>

<div class="form-group">
  {{ Form::label('startDate', 'Fecha de Creación') }}
  {{ Form::label('startDate','*', array('class' => 'text-danger'))}}
  {{ Form::date('startDate', \Carbon\Carbon::now(), null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
  {{ Form::label('endDate', 'Fecha de Término ') }}
  {{ Form::label('endDate','*', array('class' => 'text-danger'))}}
  {{ Form::date('endDate', \Carbon\Carbon::now(), null, ['class' => 'form-control'])}}
</div>

<div class="form-group mt-4 d-flex justify-content-center">
  {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
</div>
