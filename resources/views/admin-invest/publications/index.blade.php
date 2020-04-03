@extends('layouts.app')
@php
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Researcher;
@endphp
@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card border-secondary shadow">
                <div class="card-header h2 bg-tertiary">
                    Lista de Publicaciones
                    @auth
                        <a href="{{ route('publications.create') }}" class="btn btn-sm btn-success  float-right">Crear nueva
                            Publicación</a>
                    @endauth
                </div>


                <div class="card-body">
                    {!! Form::open(['route' => 'publications.index','method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search']) !!}
                    <div class="form-group">
                        {{ Form::label('publicationType','Tipo de Publicación') }}
                        {{ Form::select('publicationType', config('publicationTypes.Types'),null, ['class' => 'form-control', 'placeholder' => 'Seleccione un Tipo de Publicación']) }}
                    </div>
                    <button type="submit" class="btn btn-secondary mr-4">Buscar</button>
                    {!! Form::close() !!}

                    {!! Form::open(['route' => 'publications.index','method' =>'GET','class' =>'navbar navbar-light bg-light','role' => 'search'])!!}
                    <div class="form-group">
                        {{ Form::label('researcher','Autor a Buscar') }}
                        {!! Form::text('researcher',null,['class'=>'form-control','placeholder'=>'Ingrese Autor']) !!}


                    </div>
                    <button class="btn btn-secondary mr-4" type="submit">Buscar</button>

                    {!! Form::close()!!}


                    @if ($publications->items() != null)
                        @auth
                        @if(Auth::user()->userType == "Investigador" && Auth::user()->researcher_id != null)
                                @php
                                    $currentResearcher = Researcher::find(Auth::user()->researcher_id);
                                    //Se obtienen los grupos asociados al investigador conectado
                                    $currentPublicationsids = Researcher::find($currentResearcher->id)->publications()->pluck('publication_id')->toArray();
                                @endphp
                            @endif
                        @endauth
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 1cm;">ID</th>
                                    <th style="width: 10cm;">Título</th>
                                    <th style="width: 5cm;">Nombre de la Revista o Acta</th>
                                    <th style="width: 3.8cm;">Fecha de Publicación</th>
                                    <th style="width: 3.8cm;">Tipo</th>
                                    <th style="width: 3.8cm;">Subtipo</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publications as $publication)
                                <tr>
                                    <td> {{ $publication->id }} </td>
                                    <td> {{ $publication->title }} </td>
                                    <td> {{ $publication->type }} </td>
                                    <td>{{ date('d-m-Y', strtotime($publication->date)) }}</td>
                                    <td> {{ $publication->publicationType }} </td>
                                    <td> {{ $publication->publicationSubType }} </td>

                                    <td width="10px">
                                        <a href="{{ route('publications.show', $publication->id) }}"
                                            class="btn btn-sm btn-secondary">
                                            Ver
                                        </a>
                                    </td>
                                    @auth
                                    @if(Auth::user()->userType == "Administrador" || ( isset($currentResearcher) && in_array($publication->id,$currentPublicationsids)))
                                        <td width="10px">
                                            <a href="{{ route('publications.edit', $publication->id) }}"
                                                class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td>
                                        <td width="10px">
                                            {!! Form::open(['route' => ['publications.destroy', $publication->id], 'method' => 'DELETE'])!!}
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de querer eliminar esta publicación?')">
                                                    Eliminar
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    @else
                                        <td></td><td></td>
                                    @endif
                                    @endauth
                                    @if(Auth::user() == null)
                                        <td></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $publications->render() }}
                    @else
                        <p class="h1 text-center mt-4"> No se encontraron coincidencias </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
