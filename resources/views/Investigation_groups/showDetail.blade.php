@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            @if ($invGroup->logo)
            <img class="img-fluid thickBorder rounded shadow mb-4" src="{{ asset($invGroup->logo) }}"
                alt="{{ $invGroup->name }}" width="300" height="300">
            @else
            <img src="{{ asset('systemImages/signos_interrogacion.png') }}"
                class="img-fluid thickBorder rounded shadow mb-4" alt="{{ $invGroup->name }}" width="300" height="300">
            @endif

        </div>
    </div>
    <div class="row justify-content-center">
        <h4>{{ $invGroup->name }}</h4>
    </div>
</div>

@endsection