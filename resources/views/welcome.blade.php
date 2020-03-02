@extends('layouts.app')


@section('content')
<p class="font-weight-bold text-dark mt-2 display-4">Grupos de investigación</p>

<div class="container-fluid">
    <div class="row">

        @foreach ($invGroups as $invGroup)
        <div class="col-1 col-md-3 offset-1">
            <a href="{{ url('#') }}">
                @if (!empty($invGroup->logo))
                    <img class="card-img-top img-responsive" src="#"
                    alt="LogoGrupoInvestigacion">
                @else
                    <img class="card-img-top img-responsive" src="https://static.wixstatic.com/media/c7a2b4_e0415203ebc349a980edca8688decc16.png"
                    alt="LogoGrupoInvestigacion">
                @endif
                <h3 class="card-text  text-dark d-flex d-inline align-self-stretch">{{ $invGroup->name }}</h3>
            </a>
        </div>
        @endforeach
        {{ $invGroups->render() }}
    </div>
</div>
@endsection