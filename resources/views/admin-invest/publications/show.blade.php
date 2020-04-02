@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8">
            <div class = "card border-secondary shadow">
                <div class = "card-header h4" >
                    {{$publication->title}}
                </div>

                <div class="card-body">
                    <p><strong>Id:</strong> {{$publication->id}}</p>
                    <p><strong>Título:</strong> {{$publication->title}}</p>
                    <p><strong>Título segundo idioma:</strong> {{$publication->titleSecondLanguage}}</p>
                    <p><strong>Tipo de Publicacion:</strong> {{$publication->publicationType}}</p>
                    <p><strong>SubTipo de Publicacion:</strong> {{$publication->publicationSubType}}</p>
                    <p><strong>Revista o Acta:</strong> {{$publication->type}}</p>
                    <p><strong>Fecha de Publicación:</strong> {{ date('d-m-Y', strtotime($publication->date)) }}</p>
                    <p><strong>Id del Grupo de Investigación:</strong> {{$publication->investigation_group_id}}</p>
                    <div class="form-group">
                        {{ Form::label('id','Investigador(es) participante(s)')}}
                        {{Form::select('id[]',$publicationResearchers,null, ['class'=>'form-control', 'multiple' => true,'id' => 'researchers_id2','name' => 'researchers_name2'])}}
                      </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
