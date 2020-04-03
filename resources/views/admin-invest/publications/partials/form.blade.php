<div class="form-group">
    {{ Form::label('title', 'Titulo de la Publicación') }}
    {{ Form::label('title','*', array('class' => 'text-danger'))}}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>
<div class="form-group">
    {{ Form::label('titleSecondLanguage ', 'Titulo de la Publicación en otro Idioma') }}
    {{ Form::text('titleSecondLanguage', null, ['class' => 'form-control', 'id' => 'titleSecondLanguage']) }}
</div>
<div class="form-group">
    {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
    {{ Form::label('investigation_group_id','*', array('class' => 'text-danger'))}}
    {{ Form::select('investigation_group_id', $invGroups, null,
    ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo de investigación', 'id' => 'investigation_group_id']) }}
</div>

<div class="form-group">
    <label for="researchers">Otros Investigador(es) Asociado(s)</label>
    {{ Form::label('researchers','*', array('class' => 'text-danger'))}}
    {{ Form::select('researchers[]', $researchers, null,
            ['class' => 'form-control', 'multiple' => true, 'id' => 'researchers_id']) }}
</div>

<a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#researcher_form">Crear nuevo Investigador</a>

<div class="form-group">
    {{ Form::label('publicationType','Tipo de Publicación') }}
    {{ Form::label('publicationType','*', array('class' => 'text-danger'))}}
    {{ Form::select('publicationType',config('publicationTypes.Types'),null,['class' => 'form-control', 'placeholder'=>'Seleccionar Tipo de Publicación']) }}
</div>
<div class="form-group">
    {{ Form::label('publicationSubType','Sub Tipo') }}
    {{ Form::label('publicationSubType','*', array('class' => 'text-danger'))}}
    {{ Form::select('publicationSubType',['placeholder'=>'Seleccionar Sub-Tipo de Publicación'],null,['class' => 'form-control','id'=>'pubSubType'])}}
</div>
<div class="form-group">
    {{ Form::label('type', 'Revista o Acta') }}
    {{ Form::label('type','*', array('class' => 'text-danger'))}}
    {{ Form::text('type', null, ['class' => 'form-control', 'id' => 'type']) }}
</div>
<div class="form-group">
    {{ Form::label('date', 'Fecha de Creación') }}
    {{ Form::label('date','*', array('class' => 'text-danger'))}}
    {{ Form::date('date', \Carbon\Carbon::now(), ['readonly'])}}
</div>
<div class="form-group">
    {{ Form::label('project_id', "Nombre del Proyecto asociado") }}
    {{ Form::select('project_id', $projects, null,
    ['class' => 'form-control', 'placeholder' => 'Seleccione Proyecto asociado', 'id' => 'project_id']) }}
</div>

<div class="form-group mt-4 text-center">
    <button type="submit" class="btn btn-secondary mb-4" name="product">
        {{ __('Guardar') }}
    </button>
</div>

@include("admin-invest\publications\partials\\researcher_form")
