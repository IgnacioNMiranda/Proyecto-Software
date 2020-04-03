@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-12">
            <div class="p-2 mb-4">
                <h2 class="p-2 text-secondary font-weight-bold bg-tertiary">🎞️ Tutoriales 🎞️</h3>
                <p class= "h5 mt-3"> En esta secci&oacute;n se encuentran videos dedicados a explicar c&oacute;mo realizar las distintas acciones que maneja este sitio web.</p>
            </div>

            <article class="card">

                <div class="card-header" id="headingMaster">
                  <button class="btn btn-info" data-toggle="collapse" data-target="#MasterCollapse" aria-expanded="false" aria-controls="MasterCollapse">
                      Categorias
                  </button>
                </div>

                <div id="MasterCollapse" class="collapse" aria-labelledby="headingMaster">
                  <div class="card-body">
                    <section id="accordion">
                        @auth
                        @if(Auth::user()->userType == "Administrador")
                        <div class="card mb-4">
                          <div class="card-header" id="headingOne">
                            <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#userCollapse" aria-expanded="false" aria-controls="userCollapse">
                              👤 Usuarios
                            </button>
                          </div>

                          <div id="userCollapse" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              🎞️ <a href="https://youtu.be/clsHYzjkhjY" target="_blank">Crear Usuarios y login</a>
                              <p> Demostraci&oacute;n de c&oacute;mo crear un nuevo usuario en el sistema y de c&oacute;mo loguearse.</p>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endauth

                        <div class="card mb-4">
                            <div class="card-header" id="headingTwo">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#invGroupCollapse" aria-expanded="false" aria-controls="invGroupCollapse">
                                👥 Grupos de investigación
                              </button>
                            </div>

                            <div id="invGroupCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                @auth
                                @if(Auth::user()->userType == "Administrador")
                                  🎞️ <a href="https://youtu.be/q-v6bCqr39M" target="_blank">Crear y editar grupos de investigaci&oacute;n</a>
                                  <p> Demostraci&oacute;n de c&oacute;mo crear nuevos grupos de investigaci&oacute;n y de cómo editarlos.</p>
                                @endif
                                @endauth

                                🎞️ <a href="https://youtu.be/pcTg9i-yJOI" target="_blank">Detalle de un grupo de investigaci&oacute;n</a>
                                <p> Demostraci&oacute;n de c&oacute;mo acceder a la informaci&oacute;n espec&iacute;fica de un grupo de investigaci&oacute;n.</p>
                              </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header" id="headingThree">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#proyectCollapse" aria-expanded="false" aria-controls="proyectCollapse">
                                📋 Proyectos
                              </button>
                            </div>

                            <div id="proyectCollapse" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                @auth
                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Crear proyectos</a>
                                <p> Demostraci&oacute;n de c&oacute;mo crear nuevos proyectos en el sistema.</p>

                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Edici&oacute;n de proyectos</a>
                                <p> Edici&oacute;n de un proyecto existente.</p>
                                @endauth

                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Listado de proyectos</a>
                                <p> Acceso al listado de proyectos presentes en el sistema.</p>
                              </div>
                            </div>
                        </div>


                        @if (!Auth::user())
                          <div class="card mb-4">
                            <div class="card-header" id="headingAux">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#AuxCollapse" aria-expanded="false" aria-controls="AuxCollapse">
                                📝 Productos y Unidades 🏢
                              </button>
                            </div>

                            <div id="AuxCollapse" class="collapse" aria-labelledby="headingAux" data-parent="#accordion">
                              <div class="card-body">
                                🎞️ <a href="https://youtu.be/0gtmCOsA8uM" target="_blank">Listado de productos y unidades</a>
                                <p> Despliegue del listado de productos y unidades.</p>
                              </div>
                            </div>
                          </div>
                        @endif

                        @auth
                        <div class="card mb-4">
                            <div class="card-header" id="headingFour">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#productCollapse" aria-expanded="false" aria-controls="productCollapse">
                                📝 Productos
                              </button>
                            </div>

                            <div id="productCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                              <div class="card-body">
                                @auth
                                🎞️ <a href="https://youtu.be/vfdh5jmRvQc" target="_blank">Crear productos</a>
                                <p> Demostraci&oacute;n de c&oacute;mo crear nuevos productos en el sistema.</p>

                                🎞️ <a href="https://youtu.be/efLsr24HcUs" target="_blank">Edici&oacute;n de productos</a>
                                <p> Ver Lista de Productos y Edici&oacute;n de un producto existente.</p>
                                @endauth

                                🎞️ <a href="https://youtu.be/UTee40g7Y0w" target="_blank">Listado de productos</a>
                                <p> Acceso al listado de productos presentes en el sistema.</p>
                              </div>
                            </div>
                        </div>
                        @endauth

                        <div class="card mb-4">
                            <div class="card-header" id="headingFive">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#ResearcherCollapse" aria-expanded="false" aria-controls="ResearcherCollapse">
                                👨‍💼👩‍💼 Investigadores
                              </button>
                            </div>

                            <div id="ResearcherCollapse" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                              <div class="card-body">
                                @auth
                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Crear investigadores</a>
                                <p> Demostraci&oacute;n de c&oacute;mo crear nuevos investigadores en el sistema.</p>

                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Edici&oacute;n de investigadores</a>
                                <p> Edici&oacute;n de un investigador existente.</p>
                                @endauth

                                🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Listado de investigadores</a>
                                <p> Acceso al listado de investigadores presentes en el sistema.</p>
                              </div>
                            </div>
                        </div>

                        @auth
                        <div class="card mb-4">
                            <div class="card-header" id="headingSix">
                              <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#UnitCollapse" aria-expanded="false" aria-controls="UnitCollapse">
                                🏢 Unidades
                              </button>
                            </div>

                            <div id="UnitCollapse" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                              <div class="card-body">
                                🎞️ <a href="https://youtu.be/JLr-xv_f6Nc" target="_blank">Crear unidades</a>
                                <p> Demostraci&oacute;n de c&oacute;mo crear nuevas unidades en el sistema.</p>

                                🎞️ <a href="https://youtu.be/jhAGzY7RAC4" target="_blank">Edici&oacute;n de unidades</a>
                                <p> Edici&oacute;n de una unidad existente.</p>
                              </div>
                            </div>
                        </div>
                        @endauth

                        <div class="card mb-4">
                          <div class="card-header" id="headingSeven">
                            <button class="btn btn-success border-secondary" data-toggle="collapse" data-target="#PublicationCollapse" aria-expanded="false" aria-controls="PublicationCollapse">
                              📃 Publicaciones
                            </button>
                          </div>

                          <div id="PublicationCollapse" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                            <div class="card-body">
                              @auth
                              🎞️ <a href="https://www.youtube.com/watch?v=ZMCUBvHFYRc" target="_blank">Crear publicaciones</a>
                              <p> Demostraci&oacute;n de c&oacute;mo crear nuevas publicaciones en el sistema.</p>

                              🎞️ <a href="https://www.youtube.com/watch?v=Z9tHi232ODs" target="_blank">Edici&oacute;n de publicaciones</a>
                              <p> Edici&oacute;n de una publicaci&oacute;n existente.</p>
                              @endauth

                              🎞️ <a href="https://www.youtube.com/watch?v=QwoXobFSFwc" target="_blank">Listado de publicaciones</a>
                              <p> Acceso al listado de publicaciones presentes en el sistema.</p>
                            </div>
                          </div>
                        </div>

                    </section>
                  </div>
                </div>
          </article>
        </div>
    </div>
</section>
@endsection
