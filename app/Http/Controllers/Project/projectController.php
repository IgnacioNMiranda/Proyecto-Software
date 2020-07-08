<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\Researcher;
use App\InvestigationGroup;
use App\Unit;
use Illuminate\Support\Str;

class ProjectController extends Controller
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
    //Muestra la lista de proyectos
    public function index(Request $request)
    {
        $projects = Project::state($request->get('state'))->orderBy('id','DESC')->paginate();
        return view('admin-invest.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Crea un proyecto
    public function create()
    {
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        $investigation_groups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        if(Auth::user()->userType == "Investigador"){
            if(Auth::user()->researcher_id != null){
                $investigation_groups = Researcher::find(Auth::user()->researcher_id)->investigation_groups()->get()->pluck('name', 'id');
            }else{
                return back()->withErrors(['Debe asociarse a un grupo de investigación antes de crear proyectos.']);
            }
        }

        return view('admin-invest.projects.create',compact('units', 'investigation_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Salva los datos del proyecto
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->all());
        $project->slug = Str::slug($project->name);
        $project->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $proyectResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $proyectResearchers = $request->get('researchers');
        }

        $project->researchers()->attach($proyectResearchers);

        return redirect()->route('projects.create',$project->id)
            ->with('info','Proyecto creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Se ve el detalle del registro en la Bd
    public function show($id)
    {
        $project = Project::find($id);
        $projectResearchers = $project->researchers()->pluck('researcher_name');
        return view('admin-invest.projects.show',compact('project','projectResearchers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Formulario de edicion
    public function edit($id)
    {
        $project = Project::find($id);
        $investigation_groups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.projects.edit',compact('project','investigation_groups', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Se actualiza lo del formulario de edicion
    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = Project::find($id);
        $project->fill($request->all())->save();

        $project->slug = Str::slug($project->name);
        $project->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $proyectResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $proyectResearchers = $request->get('researchers');
        }

        $project->researchers()->sync($proyectResearchers);

        return redirect()->route('projects.edit',$project->id)
            ->with('info','Proyecto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }
}
