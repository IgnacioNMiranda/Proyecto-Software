@extends('layouts.app')


@section('content')
<div class="bg bg-tertiary text-center mb-4 border border-primary">
    <p class="font-weight-bold text-dark pt-2 h5">Grupos de investigación</p>
</div>


<section class="container-fluid">
    <div class="row mb-4">

        @foreach ($invGroups as $invGroup)
        <div class="col-sm-12 col-md-4 col-lg-3">
            <a href="{{ url('#') }}">
                @if ($invGroup->logo)
                    <img class="img-fluid d-flex mx-auto" src="{{ asset($invGroup->logo) }}" alt="LogoGrupoInvestigacion">
                @else
                    <img class="img-fluid d-flex mx-auto" src="{{ asset('systemImages/signos_interrogacion.png') }}"
                    width="300" height="300" alt="LogoGrupoInvestigacion">
                @endif
                <h3 class="text-dark d-flex d-inline align-self-stretch">{{ $invGroup->name }}</h3>
            </a>
        </div>
        @endforeach



    </div>
</section>

<div style="margin-left:45%; margin-bottom:70px;">
    {{ $invGroups->render() }}
</div>

@endsection