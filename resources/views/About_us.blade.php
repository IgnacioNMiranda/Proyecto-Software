@extends('layouts.app')

@section('content')
<style>
    .heading {
        color: #000000;
    }

    .firstM::first-letter {
        font-size: 1.5cm;
        color: #4E7CA8;
    }

    .fiice {
        font-size: 0.9cm;
        position: relative;
        line-height: 1.8cm;
    }

    .roles {
        font-size: 0.6cm;
        line-height: 0cm;
    }

    p {
        font-family: 'Poppins', sans-serif;
    }
</style>

<div>
    <div class="container mb-4">
        <div class="row">
            <div class=" col-12 col-md-7">
                <div class="row">
                    <div class="col-12 col-ml-4">
                        <h1 class="heading text-justify"> ¿Quiénes Somos?</h1>
                        <p class="text-justify" style="font-size: 22.5px;"> Somos <span
                                class="text-secondary">FIICE</span>, un equipo dedicado al desarrollo web con gran
                            compromiso hacia nuestros clientes, asegurando siempre resultados de la m&aacute;s alta
                            calidad. Nuestro equipo est&aacute; conformado por estudiantes de la UCN con grandes
                            capacidades y virtudes.
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-5 text-center">
                        <img class="img-responsive pb-4" src="{{ asset('systemImages/Escudo-UCN-Full-Color.png') }}"
                            width="180" height="180" alt="Logo UCN">
                    </div>
                    <div class="col-12 col-md-7 align-self-center">
                        <img class="img-responsive pb-4" src="{{ asset('systemImages/Logo_ICCI.jpeg') }}" width="350"
                            height="150" alt="Logo UCN">
                    </div>
                </div>
            </div>
            <div class="col-12 offset-md-1 col-md-4 mb-4">
                <p class="firstM fiice"> Fabi&aacute;n Muñoz </p>
                <p class="roles"> Encargado Base de Datos </p>
                <p class="firstM fiice"> Ignacio Santander </p>
                <p class="roles"> L&iacute;der de Grupo </p>
                <p class="firstM fiice"> Ignacio Miranda</p>
                <p class="roles"> L&iacute;der Programación </p>
                <p class="firstM fiice"> Carlos Mena</p>
                <p class="roles"> Encargado SQA</p>
                <p class="firstM fiice"> Eduardo Alvarez</p>
                <p class="roles"> Documentador T&eacute;cnico</p>
            </div>
        </div>
    </div>
    @endsection