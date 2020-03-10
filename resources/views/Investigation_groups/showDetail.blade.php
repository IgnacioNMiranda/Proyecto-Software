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
            <h4>{{ $invGroup->name }}</h4>
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
            <a href="#" class="btn btn-lg btn-secondary"> Productos </a>
        </div>
        <div class="col-4">
            <a href="#" class="btn btn-lg btn-secondary"> Proyectos </a>
        </div>
        <div class="col-4">
            <a href="#" class="btn btn-lg btn-secondary"> Investigadores </a>
        </div>
    </div>

</div>

@endsection