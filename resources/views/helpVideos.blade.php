@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row">
        <div class="col-12">
            <div class="p-2 mb-4">
                <h2 class="p-2 text-secondary font-weight-bold bg-tertiary">🎞️ V&iacute;deos de autoayuda 🎞️</h3>
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
                            <button class="btn btn-secondary" data-toggle="collapse" data-target="#userCollapse" aria-expanded="false" aria-controls="userCollapse">
                                 Usuarios
                            </button>
                          </div>
                      
                          <div id="userCollapse" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                               Links de Usuarios
                            </div>
                          </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header" id="headingTwo">
                              <button class="btn btn-info" data-toggle="collapse" data-target="#invGroupCollapse" aria-expanded="false" aria-controls="invGroupCollapse">
                                  Grupos de investigación
                              </button>
                            </div>
                        
                            <div id="invGroupCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                 Links de Grupos de investigación
                              </div>
                            </div>
                        </div>
                        @endif
                        @endauth
        
                        <div class="card mb-4">
                            <div class="card-header" id="headingThree">
                              <button class="btn btn-info" data-toggle="collapse" data-target="#proyectCollapse" aria-expanded="false" aria-controls="proyectCollapse">
                                  Proyectos
                              </button>
                            </div>
                        
                            <div id="proyectCollapse" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                 Links de proyectos
                              </div>
                            </div>
                        </div>
        
                        <div class="card mb-4">
                            <div class="card-header" id="headingFour">
                              <button class="btn btn-info" data-toggle="collapse" data-target="#productCollapse" aria-expanded="false" aria-controls="productCollapse">
                                  Productos
                              </button>
                            </div>
                        
                            <div id="productCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                              <div class="card-body">
                                 Links de productos
                              </div>
                            </div>
                        </div>
        
                        <div class="card mb-4">
                            <div class="card-header" id="headingFive">
                              <button class="btn btn-info" data-toggle="collapse" data-target="#ResearcherCollapse" aria-expanded="false" aria-controls="ResearcherCollapse">
                                  Investigadores
                              </button>
                            </div>
                        
                            <div id="ResearcherCollapse" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                              <div class="card-body">
                                 Links de investigadores
                              </div>
                            </div>
                        </div>
        
                        <div class="card mb-4">
                            <div class="card-header" id="headingSix">
                              <button class="btn btn-info" data-toggle="collapse" data-target="#UnitCollapse" aria-expanded="false" aria-controls="UnitCollapse">
                                  Unidades
                              </button>
                            </div>
                        
                            <div id="UnitCollapse" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                              <div class="card-body">
                                 Links de unidades
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