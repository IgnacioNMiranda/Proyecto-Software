@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="col-5 text-center">
            @if ($invGroup->logo)
            <img class="img-fluid thickBorder rounded shadow mb-4" src="{{ asset($invGroup->logo) }}"
                alt="{{ $invGroup->name }}">
            @else
            <img src="{{ asset('systemImages/signos_interrogacion.png') }}"
                class="img-fluid thickBorder rounded shadow mb-4" alt="{{ $invGroup->name }}" width="300" height="300">
            @endif

            <div class="row justify-content-center">
                <div class="col-5">
                    <h4>{{ $invGroup->name }}</h4>
                </div>
                @auth
                    @if (Auth::user()->userType == "Administrador")
                        <div class="col-4">
                            <a href="{{ route('investigationGroups.edit', $invGroup->id) }}" class="btn btn-tertiary border-secondary">
                                Editar✏️
                            </a>
                    </div>
                    @endif
                @endauth
            </div>
        </div>

        <div class="col-4">
            <h4 class="font-weight-bold">Unidad(es) asociada(s)</h4>
            <ul>
                @foreach ($invGroup->units as $unit)
                <li class="h6">
                    {{ $unit->name }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row justify-content-around text-center verticalTopOffset">
        <div class="col-4">
            <!-- exists() comprueba si existen products relacionados con invGroup -->
            @if ($invGroup->products()->exists())
                <a href="#" class="btn btn-lg btn-secondary"> Productos </a>
            @else
                <a href="#" class="btn btn-lg btn-secondary" data-toggle="modal" data-target="#no_products_modal"> Productos </a>
            @endif
        </div>
        <div class="col-4">
            <!-- exists() comprueba si existen projects relacionados con invGroup -->
            @if ($invGroup->projects()->exists())
                <a href="#" class="btn btn-lg btn-secondary"> Proyectos </a>
            @else
                <a href="#" class="btn btn-lg btn-secondary" data-toggle="modal" data-target="#no_projects_modal"> Proyectos </a>
            @endif
        </div>
        <div class="col-4">
            <!-- exists() comprueba si existen researchers relacionados con invGroup -->
            @if ($invGroup->researchers()->exists())
                <a href="#" class="btn btn-lg btn-secondary"> Investigadores </a>
            @else
                <a href="#" class="btn btn-lg btn-secondary" data-toggle="modal" data-target="#no_researchers_modal"> Investigadores </a>
            @endif
        </div>
    </div>

</div>

@include("\investigation_groups\partials\\no_products_modal")
@include("\investigation_groups\partials\\no_projects_modal")
@include("\investigation_groups\partials\\no_researchers_modal")
@endsection