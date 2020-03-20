@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-9 justify-content-center">   
            <div class="card border-secondary shadow">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Crear Producto
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'products.store']) !!}
                    @csrf
                    <div class="form-group">
                        {{ Form::label('name', 'Nombre del Producto') }}
                        {{ Form::label('name','*', array('class' => 'text-danger'))}}
                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                    </div>


                    
                    <div class = "form-group">
                    {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
                    {{ Form::label('investigation_group_id','*', array('class' => 'text-danger'))}}
                    {{ Form::select('investigation_group_id', $invGroups, null, 
                                ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo de investigación', 'id' => 'investigation_group_id']) }}
                    </div>
     
                    <div class="form-group">
                        <label for="researchers">Investigador(es) Asociado(s)</label>
                        {{ Form::label('researchers','*', array('class' => 'text-danger'))}}
                        {{ Form::select('researchers[]', $researchers, null,
                                ['class' => 'form-control', 'multiple' => true, 'id' => 'researchers_id']) }}
                    </div>

                    <a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#researcher_form">Crear nuevo Investigador</a>

                    <div class="form-group">
                        {{ Form::label('description', 'Descripción del Producto') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                    </div>
 
                    <div class = "form-group">
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
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(function(){
        $('#investigation_group_id').on('change', onSelectInvestigationGroupChange);
    });

    function onSelectInvestigationGroupChange(){
        var investigation_group_id = $(this).val();
        if(!investigation_group_id)
            $('#researchers').html('<option value="">Seleccione Ingestigador(es)</option>');
        //AJAX
        $.get('/investigationGroups/'+investigation_group_id+'/researchers', function(data){
            var html_select = '<option value="">Seleccione Investigador(es)</option>';
            for(var i = 0; i<data.length; i++)
                html_select += '<option value="'+data[i].id+'">'+data[i].researcher_name+'</option>';
            $('#researchers').html(html_select);

        });
    }
</script>



</section>
@include("admin-invest\products\partials\\researcher_form")

@endsection

