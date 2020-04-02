@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-9 justify-content-center">
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Editar Publicación
                </div>

                <div class="card-body">
                    {!! Form::model($publication, ['route' => ['publications.update', $publication->id],
                        'method'=> 'PUT'])!!}
                        @csrf

                        {{ Form::hidden('id',$publication->id)}}

                        <div class="form-group">
                            {{ Form::label('title', 'Titulo de la Publicación') }}
                            {{ Form::label('title','*', array('class' => 'text-danger'))}}
                            {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('titleSecondLanguage ', 'Titulo de la Publicación en otro Idioma') }}
                            {{ Form::text('titleSecondLanguage', null, ['class' => 'form-control', 'id' => 'titleSecondLanguage']) }}
                        </div>

                        <div class = "form-group">
                        {{ Form::label('investigation_group_id', "Grupo de investigación asociado") }}
                        {{ Form::label('investigation_group_id','*', array('class' => 'text-danger'))}}
                        {{ Form::select('investigation_group_id', $invGroups, null,
                        ['class' => 'form-control', 'placeholder' => 'Seleccione Grupo de investigación', 'id' => 'investigation_group_id']) }}
                        </div>

                        <!-- Investigadores que son del grupo de investigación seleccionado-->
                        <div class="form-group">
                            {{ Form::label('researchers[]','Investigador(es) Asociado(s) del grupo de investigación')}}
                            {{ Form::label('researchers[]','*', array('class' => 'text-danger'))}}
                            {!! Form::select('researchers[]', ['placeholder' => 'Seleccione investigador(es)'], null,
                            ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'researchers']) !!}
                        </div>

                        <!-- Posibles investigadores elegidos que son externos al grupo de investigación seleccionado-->
                        <div class="form-group">
                            {{ Form::label('notResearchers[]','Investigador(es) Asociado(s) externos al grupo de investigación')}}
                            {!! Form::select('notResearchers[]', ['placeholder' => 'Seleccione investigador(es)'], null,
                            ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'notResearchers']) !!}
                        </div>

                        <a href="#" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#researcher_form">Crear nuevo Investigador</a>

                        <div class="form-group">
                            {{ Form::label('publicationType','Tipo de Publicación') }}
                            {{ Form::label('publicationType','*', array('class' => 'text-danger'))}}
                            {{ Form::select('publicationType',config('publicationTypes.Types'),null,['class' => 'form-control', 'id'=>'pubType','placeholder'=>'Seleccionar Tipo de Publicación']) }}
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

                        <div class = "form-group">
                            {{ Form::label('date', 'Fecha de Creación') }}
                            {{ Form::label('date','*', array('class' => 'text-danger'))}}
                            {{ Form::date('date', \Carbon\Carbon::now(), ['readonly'])}}
                        </div>

                        <div class="form-group">
                            {{ Form::label('project_id', "Nombre del Proyecto asociado") }}
                            {{ Form::select('project_id', ['placeholder' => 'Seleccione proyecto asociado'], null,
                            ['class' => 'form-control', 'id' => 'project_id', 'data-old' => old('project_id')]) }}
                        </div>

                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn btn-secondary mb-4" name="publication">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>
@include("admin-invest\publications\partials\\researcher_form")
@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

        function loadResearchers(publicationResearchers){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('researchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (researchers) {

                    for (var i = 0; i < researchers.length; i++) {
                        var possiblySelected = publicationResearchers.find(researcher => researcher.id === researchers[i].id) != undefined ? 'selected' : '';

                        option +=  "<option value='" + researchers[i].id + "' " + possiblySelected + ">" + researchers[i].researcher_name + "</option>";
                    }

                    $('#researchers').html(" ");
                    $("#researchers").append(option); //Agrega las options al select #researchers
                },
                error: function () {
                    option += '<option value="0" selected disabled>Seleccione investigador(es)</option>';
                    $('#researchers').html(" ");
                    $("#researchers").append(option); //Agrega las options al select #researchers
                }
            });

        }

        function loadNotResearchers(publicationResearchers){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('notResearchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (notResearchers) {
                    for (var i = 0; i < notResearchers.length; i++) {
                        var possiblySelected = publicationResearchers.find(researcher => researcher.id === notResearchers[i].id) != undefined ? 'selected' : '';

                        option +=  "<option value='" + notResearchers[i].id + "' " + possiblySelected + ">" + notResearchers[i].researcher_name + "</option>";
                    }

                    $('#notResearchers').html(" ");
                    $("#notResearchers").append(option); //Agrega las options al select #researchers
                },
                error: function () {
                    option += '<option value="0" selected disabled>Seleccione investigador(es)</option>';
                    $('#notResearchers').html(" ");
                    $("#notResearchers").append(option); //Agrega las options al select #researchers
                }
            });
        }

        function loadAllResearchers(){
            var publicationResearchers = {!! json_encode($publication->researchers) !!};
            loadResearchers(publicationResearchers);
            loadNotResearchers(publicationResearchers);
        }

        loadAllResearchers(); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
        $(document).on('change', '#investigation_group_id', loadAllResearchers);
    });
</script>

<script>
        $(document).ready(function () {

            function loadProjects(publicationProject){
                var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion
                // console.log(publicationProject);

                var option = " "; // Define las opciones

                $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                    type: 'get',
                    url: '{!!URL::to('projectsGroup')!!}',
                    data: {'id': invGroup_id},
                    success: function (projects) {

                        var old = $('#project_id').data('old') != '' ? $('#project_id').data('old') : '';

                        for (var i = 0; i < projects.length; i++) {
                            var possiblySelected = '';
                            if(old == projects[i].id || projects[i].id == publicationProject.id){
                                possiblySelected = 'selected';
                            }
                            option +=  "<option value='" + projects[i].id + "' " + possiblySelected + ">" + projects[i].name + "</option>";
                        }

                        $('#project_id').html(" ");
                        $("#project_id").append('<option value="0" selected disabled>Seleccione proyecto asociado</option>');
                        $("#project_id").append(option); //Agrega las options al select #researchers
                    },
                    error: function () {
                        option += '<option value="0" selected disabled>Seleccione proyecto asociado</option>';
                        $('#project_id').html(" ");
                        $("#project_id").append(option); //Agrega las options al select #researchers
                    }
                });
            }
            var publicationProject = {!! json_encode($publication->project) !!};
            loadProjects(publicationProject); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
            $(document).on('change', '#investigation_group_id', loadProjects);
            });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        function loadSubType(publicationSubType){
        var pubType = $('#pubType').val(); //Obtiene la id del grupo de investigacion
        console.log(publicationSubType);

            if(pubType=='Indexada'){

                $('#pubSubType').html(" ");
                $("#pubSubType").append('<option value="0" selected disabled>Seleccione SubTipo de la publicación</option>');
                $("#pubSubType").append('<option value="1" ' + (publicationSubType == "WOS" ? 'selected' : '') + '>WOS</option>');
                $("#pubSubType").append('<option value="2" ' + (publicationSubType == "SCOPUS" ? 'selected' : '') + '>SCOPUS</option>');
                $("#pubSubType").append('<option value="3" ' + (publicationSubType == "SCIELO" ? 'selected' : '') + '>SCIELO</option>');
                $("#pubSubType").append('<option value="4" ' + (publicationSubType == "Otro Indice" ? 'selected' : '') + '>Otro Indice</option>');

            }else if(pubType=='No Indexada'){
                $('#pubSubType').html(" ");
                $("#pubSubType").append('<option value="0" selected disabled>Seleccione SubTipo de la publicación</option>');
                $("#pubSubType").append('<option value="1" ' + (publicationSubType == "CONGRESO" ? 'selected' : '') + '>CONGRESO</option>');
                $("#pubSubType").append('<option value="2" ' + (publicationSubType == "REVISTA" ? 'selected' : '') + '>REVISTA</option>');

            }
        }
        var publicationSubType = {!! json_encode($publication->publicationSubType) !!};
        loadSubType(publicationSubType);
        $(document).on('change', '#pubType', loadSubType);
    });
</script>
@endsection
