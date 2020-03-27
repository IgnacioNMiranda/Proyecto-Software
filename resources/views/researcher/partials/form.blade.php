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
    @php
    $countries = countries();
    $paises = array();
    @endphp
    @foreach ($countries as $clave=>$valor)
    @php
    $country = country($clave);
    $paises[$country->getName()] = $country->getName();
    @endphp
    @endforeach
    {{ Form::label('country','País') }}
    {{ Form::label('country','*', array('class' => 'text-danger'))}}
    {{ Form::select("country",$paises,null,['class' => 'form-control','placeholder'=>'Seleccionar país']) }}
</div>

<div class="form-group">
    {{ Form::label('state','Estado')}}
    {{ Form::label('state','*', array('class' => 'text-danger'))}}
    {{ Form::select("state",["Activo" => "Activo", "Inactivo" => "Inactivo"],null,['class' => 'form-control', 'placeholder'=>'Seleccionar estado']) }}
</div>

<div class="form-group">
    {{ Form::label('units','Unidad asociada') }}
    {{ Form::label('units','*', array('class' => 'text-danger'))}}
    {{ Form::select('unit_id', $units ,null,['class' => 'form-control', 'placeholder'=>'Seleccionar unidad']) }}
</div>

@php
$researcherInvGroup = isset($researcher) ? $researcher->investigation_groups()->pluck('investigation_group_id') : null;
@endphp
<div class="form-group">
    {{ Form::label('investigation_groups[]','Grupo(s) de investigación asociado(s)') }}
    {{ Form::label('investigation_groups[]','*', array('class' => 'text-danger'))}}
    {{ Form::select('investigation_groups[]', $invGroups, $researcherInvGroup, ['class' => 'form-control', 'id' => 'investigation_groups', 'multiple' => 'multiple']) }}
</div>

<div class="form-group mt-4 d-flex justify-content-center">
    {{ Form::submit('Guardar', ['class' => 'btn btn-secondary']) }}
</div>