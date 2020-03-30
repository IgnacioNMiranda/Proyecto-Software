@extends('layouts.app')

@section('content')
<div class = "container">
    <div class = "row justify-content-center">
        <div class = "col-md-8 border shadow pt-4">
            <div class = "card border-secondary">
                <div class = "card-header h4" >
                    Ver Publicación
                </div>

                <div class="panel-body">
                    <p><strong>Titulo</strong> {{$publication->title}}</p>
                    <p><strong>Slug</strong> {{$publication->slug}}</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
