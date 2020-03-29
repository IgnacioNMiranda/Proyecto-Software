@extends('layouts.app')

@section('content')
<section class="container p-4">
    <div class="row justify-content-center">
        <div class = "col-md-8 justify-content-center">   
            <div class="card border-secondary">
                <div class = "card-header h2 d-flex justify-content-center mb-4 bg-tertiary" >
                    Editar Proyecto
                </div>

                <div class="card-body">
                    {!! Form::model($project,['route' => ['projects.update', $project->id], 'method' => 'PUT']) !!}

                    @include('admin-invest.projects.partials.form')
                    
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</section>
@include("admin-invest\projects\partials\\researcher_form")
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        function loadResearchers(projectResearchers){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion
        
            var option = " "; // Define las opciones
        
            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('researchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (researchers) {
                    for (var i = 0; i < researchers.length; i++) {
                        var possiblySelected = projectResearchers.find(researcher => researcher.id === researchers[i].id) != undefined ? 'selected' : '';

                        option +=  "<option value='" + researchers[i].id + "' " + possiblySelected + ">" + researchers[i].researcher_name + "</option>";
                    } 
                
                    $('#researchers').html(" ");
                    $("#researchers").append(option); //Agrega las options al select #researchers
                },
                error: function () {
                    option += '<option value="0" selected disabled>Seleccione proyecto asociado</option>';
                    $('#project_id').html(" ");
                    $("#project_id").append(option); //Agrega las options al select #researchers
                }
            });
        }

        function loadNotResearchers(projectResearchers){
            var invGroup_id = $('#investigation_group_id').val(); //Obtiene la id del grupo de investigacion

            var option = " "; // Define las opciones

            $.ajax({ //Define la respuesta ajax de tipo get, llamando a la ruta researchersGroup y enviando invGroup_id como id
                type: 'get',
                url: '{!!URL::to('notResearchersGroup')!!}',
                data: {'id': invGroup_id},
                success: function (notResearchers) {
                    for (var i = 0; i < notResearchers.length; i++) {
                        var possiblySelected = projectResearchers.find(researcher => researcher.id === notResearchers[i].id) != undefined ? 'selected' : '';

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
            var projectResearchers = {!! json_encode($project->researchers) !!};
            loadResearchers(projectResearchers);
            loadNotResearchers(projectResearchers);
        }

        loadAllResearchers(); //Se llama apenas cargue la página para que rellene con investigadores del grupo si es que hubo un error al rellenar el formulario->Guardar
        $(document).on('change', '#investigation_group_id', loadAllResearchers);
    });
</script>
@endsection