<?php

namespace App\Http\Controllers\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publication;
use App\Researcher;
use App\InvestigationGroup;
use App\Unit;

use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class publicationController extends Controller
{
    /* Redirige a iniciar sesion si se intenta ingresar
    a la url sin haber ingresado sesion
    */
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $publications = Publication::publicationType($request->get('publicationType'))
        ->orderBy('id','DESC')
        // $publications = Publication::orderBy('id','DESC')
        ->paginate();


        return view('admin-invest.publications.index',compact('publications'));
    }

    public function create()
    {
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');

        return view('admin-invest.publications.create', compact('invGroups','units'));
    }


    public function store(PublicationStoreRequest $request)
    {
        //validar campos obligatorios
        $publication = Publication::create($request->all());
        $publication->slug = Str::slug($publication->title);
        $publication->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $publicationResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $publicationResearchers = $request->get('researchers');
        }

        //Asignacion n-n con researchers, attach para crear la relacion
        $publication->researchers()->attach($publicationResearchers);

        return redirect()->route('publications.create')
            ->with('info', 'Publicacion creada con éxito');
    }




    public function show($id)
    {
        return redirect('/');
    }





        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publication::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');

    }
    public function edit($id)
    {
        $publication = Publication::find($id);
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name', 'id');
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.publications.edit', compact('publication','invGroups','units'));
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationUpdateRequest $request, $id)
    {
        //validar campos obligatorios
        $publication = Publication::find($id);
        $publication -> fill($request->all())->save();

        $publication->slug = Str::slug($publication->title);
        $publication->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $publicationResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $publicationResearchers = $request->get('researchers');
        }

        //Asignacion n-n con researcher, sync para actualizar la relacion products con researchers
        $publication->researchers()->sync($publicationResearchers);

        return redirect()->route('publications.edit', $publication->id)
            ->with('info', 'Publicación actualizada con éxito');
    }


}
