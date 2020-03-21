@extends('layouts.app')

@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-9 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Editar Producto
                </div>

                <div class="card-body">
                    {!! Form::model($product, ['route' => ['products.update', $product->id],
                        'method'=> 'PUT'])!!}
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
         
                        <!-- Investigadores que son del grupo de investigación seleccionado-->
                        <div class="form-group">
                            {{ Form::label('researchers[]','Investigador(es) Asociado(s) del grupo de investigación')}}
                            {{ Form::label('researchers[]','*', array('class' => 'text-danger'))}}
                            {!! Form::select('researchers[]', ['placeholder' => 'Seleccione investigador(es)'], null, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'researchers']) !!}
                        </div>
    
                        <!-- Posibles investigadores elegidos que son externos al grupo de investigación seleccionado-->
                        <div class="form-group">
                            {{ Form::label('notResearchers[]','Investigador(es) Asociado(s) externos al grupo de investigación')}}
                            {!! Form::select('notResearchers[]', ['placeholder' => 'Seleccione investigador(es)'], null, ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'notResearchers']) !!}
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
                            {{ Form::select('project_id', ['placeholder' => 'Seleccione proyecto asociado'], null, ['class' => 'form-control', 'id' => 'project_id']) }}
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
</section>
@include("admin-invest\products\partials\\researcher_form")
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

        function loadResearchers(){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('researchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (researchers) {
                    for (var i = 0; i < researchers.length; i++) {
                        option +=  "<option value='" + researchers[i].id + "'>" + researchers[i].researcher_name + "</option>";
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

        function loadNotResearchers(){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('notResearchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (notResearchers) {
                    console.log(notResearchers);
                    for (var i = 0; i < notResearchers.length; i++) {
                        option +=  "<option value='" + notResearchers[i].id + "'>" + notResearchers[i].researcher_name + "</option>";
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
            loadResearchers();
            loadNotResearchers();
        }

        loadAllResearchers(); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
        $(document).on('change', '#investigation_group_id', loadAllResearchers);
    });
</script>

<script>
        $(document).ready(function () {

            function loadProjects(){
                var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion
            
                var option = " "; // Define las opciones
            
                $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                    type: 'get',
                    url: '{!!URL::to('projectsGroup')!!}',
                    data: {'id': invGroup_id},
                    success: function (projects) {
                        for (var i = 0; i < projects.length; i++) {
                            option +=  "<option value='" + projects[i].id + "'>" + projects[i].name + "</option>";
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

            loadProjects(); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
            $(document).on('change', '#investigation_group_id', loadProjects);
            });
</script>
@endsection
