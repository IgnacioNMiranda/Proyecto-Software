@extends('layouts.app')

@section('content')
<style>
    .heading { color: #000000; }
    .firstM::first-letter {
        font-size: 1.5cm;
        color:#4E7CA8;
    }
    .fiice{
        font-size: 1cm;
        position: relative;
        right: -6cm;
        top: -0cm;
        line-height: 2cm;
    }
    .roles{
        font-size: 0.6cm;
        position: relative;
        right: -8cm;
        top: -0cm;
        line-height: 0cm;  
    }
    .abajo{
        /* position: relative;
        top: 2cm; */
        font-size: 25px;
    }
    p{
        font-family: 'Poppins', sans-serif;
    }

</style>

<div>
    <div class="container mb-4">
        <div class="row">
            <div class=" col-12 col-md-7">
                <div class="row ">
                    <div class="col-12 col-ml-4">
                        <h1 class="heading text-justify"> ¿Quiénes Somos?</h1>
                        <p class="abajo text-justify "> Somos un equipo dedicado al desarrollo web con gran compromiso con nuestros clientes, 
                            asegurando siempre resultados de la más alta  calidad.  Nuestro equipo esta conformado por
                            estudiantes de la UCN  con grandes capacidades y virtudes.
                        </p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 col-md-5">
                        <img class="img-responsive abajo" src="{{ asset('systemImages/Escudo-UCN-Full-Color.png') }}" width="200" height="200"
                        alt="Logo UCN">
                    </div>
                    <div class="col-11 col-md-7 align-self-center">
                        <img class="img-responsive abajo" src="{{ asset('systemImages/Logo_ICCI.jpeg') }}" width="420" height="150"
                        alt="Logo UCN">
                    </div>
                </div>
            </div>
            <div class="col">
                <p class ="firstM fiice" > Fabian Muñoz </p>
                <p class ="roles"> Encargado Base de Datos </p>
                <p class ="firstM fiice"> Ignacio Santander </p>
                <p class ="roles"> Jefe de Grupo </p>
                <p class ="firstM fiice"> Ignacio Miranda</p>
                <p class ="roles"> Líder Programación </p>
                <p class ="firstM fiice"> Carlos Mena</p>
                <p class ="roles"> Encargado SQA</p>
                <p class ="firstM fiice"> Eduardo Alvarez</p>
                <p class ="roles"> Documentador Técnico</p>
            </div>	
        </div>
    </div>
@endsection
