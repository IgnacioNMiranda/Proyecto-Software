<?php

namespace App\Http\Controllers\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publication;

use App\InvestigationGroup;
use App\Unit;
use App\Researcher;
use Illuminate\Support\Facades\Auth;



use App\Http\Requests\PublicationStoreRequest;
use App\Http\Requests\PublicationUpdateRequest;

use Illuminate\Support\Str;

class publicationController extends Controller
{
    /* Redirige a iniciar sesion si se intenta ingresar
    a la url sin haber ingresado sesion
    */
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
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
        ->paginate();

        if($request->get('researcher') != null){
            $researcher_name = current(Researcher::where('researcher_name', $request->get('researcher'))->pluck('id')->all());
            dd($researcher_name);

            if(!$researcher_name){
                $researcher_name= ' ';
            }
        }else{
            $researcher_name = $request->get('researcher');
        }




        return view('admin-invest.publications.index',compact('publications'));
    }

    public function create()
    {
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        if(Auth::user()->userType == "Investigador"){
            if(Auth::user()->researcher_id != null){
                $invGroups = Researcher::find(Auth::user()->researcher_id)->investigation_groups()->get()->pluck('name', 'id');
            }else{
                return back()->withErrors(['Debe asociarse a un grupo de investigación antes de crear publicaciones.']);
            }
        }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::find($id);
        $publicationResearchers = $publication->researchers()->pluck('researcher_name');
        return view('admin-invest.publications.show',compact('publication','publicationResearchers'));
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
        $request->project_id == null ? $publication->project_id = null : '';
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
}
