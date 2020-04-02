@extends('layouts.app')
@php
use App\Researcher;
@endphp


@section('content')
<div class="container mt-4 p-4">
    <div class="row justify-content-center">
        <div class = "col-md-12 justify-content-center">
            <div class="card border-secondary">
                <div class = "card-header h2 bg-tertiary">
                    Listado de Publicaciones Asociadas
                </div>

                <div class="card-body">
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
                                @if ($publication->investigation_group_id == $id)

                                <td> {{ $publication->id }} </td>
                                <td> {{ $publication->title }} </td>
                                <td> {{ $publication->type }} </td>
                                <td>{{ date('d-m-Y', strtotime($publication->date)) }}</td>
                                <td> {{ $publication->publicationType }} </td>
                                <td> {{ $publication->publicationIndex }} </td>


                                @if($currentUser != null)
                                        @if ($currentUser->userType == "Administrador")
                                        <td width="10px">
                                            <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-sm btn-secondary">
                                                Editar
                                            </a>
                                        </td>
                                        @elseif(Researcher::find($currentUser->researcher_id) != null)
                                            @php
                                                $currentRes = Researcher::find($currentUser->researcher_id);
                                            @endphp
                                            @if (in_array($currentRes,$researchers))
                                                <td width="10px">
                                                    <a href="{{ route('publications.edit', $publication->id) }}" class="btn btn-sm btn-secondary">
                                                        Editar
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
