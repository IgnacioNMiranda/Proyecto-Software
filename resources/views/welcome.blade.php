@extends('layouts.app')


@section('content')
<div class="bg bg-tertiary text-center mb-4 border border-primary">
    <p class="font-weight-bold text-dark pt-2 h5">Grupos de investigación</p>
</div>


<section class="container-fluid">
    <div class="row" >

        @foreach ($invGroups as $invGroup)
        <div class="col-sm-12 col-md-6 col-lg-4 text-center" style="margin-bottom: 5rem;">
            <a href="{{ route('investigationGroup', $invGroup->slug) }}" class="text-center">
                @if ($invGroup->logo)
                    <img class=" mx-auto rounded border" src="{{ asset($invGroup->logo) }}"
                    alt="LogoGrupoInvestigacion" height="300" width="300">
                @else
                    <img class="img-fluid d-flex mx-auto" src="{{ asset('systemImages/signos_interrogacion.png') }}"
                    width="300" height="300" alt="LogoGrupoInvestigacion">
                @endif
                <h3 class="text-dark d-flex d-inline justify-content-center">{{ $invGroup->name }}</h3>
            </a>
        </div>
        @endforeach



    </div>
</section>

<div style="margin-left:45%; margin-bottom:70px;">
    {{ $invGroups->render() }}
</div>

@endsection