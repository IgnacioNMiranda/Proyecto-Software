<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;

use App\Project;
use App\Researcher;
use App\InvestigationGroup;

use Illuminate\Support\Str;

class ProjectController extends Controller
{

    /* Redirige a iniciar sesion si se intenta ingresar
    a la url sin haber ingresado sesion
    */
    public function __construct()
    {
        $this->middleware('auth');
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


    public function getResearchers(Request $request,$id){
        if($request->ajax()){
            $researchers = Researcher::researchers($id);
            return response()->json($researchers);
        }
    }

    public function getResearchersForIDInvesigationGroup(Request $request,$id)
    {
        print_r($request);
        $researchers = App\investigation_group_researcher::where('investigation_group_id', '=', $id);
        echo($researchers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Crea un proyecto
    public function create()
    {
        $investigation_groups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.projects.create',compact('investigation_groups'));
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
        $todayDate = \Carbon\Carbon::now();
        $todayDate = $todayDate->format('Y-m-d');
        if($request->startDate > $todayDate){
            return back()->withErrors(['La fecha de inicio debe ser menor o igual a la fecha actual.']);
        }
        else if($request->endDate < $request->startDate){
            return back()->withErrors(['La fecha de término debe ser mayor o igual a la fecha de creación.']);
        }

        $project = Project::create($request->all());
        $project->slug = Str::slug($project->name);
        $project->save();

        $project->researchers()->attach($request->get('researchers'));

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
        return view('admin-invest.projects.edit',compact('project','investigation_groups'));
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
        $todayDate = \Carbon\Carbon::now();
        $todayDate = $todayDate->format('Y-m-d');
        if($request->startDate > $todayDate){
            return back()->withErrors(['La fecha de inicio debe ser menor o igual a la fecha actual.']);
        }
        else if($request->endDate < $request->startDate){
            return back()->withErrors(['La fecha de término debe ser mayor o igual a la fecha de creación.']);
        }

        $project = Project::find($id);
        $project->fill($request->all())->save();

        $project->slug = Str::slug($project->name);
        $project->save();

        $project->researchers()->sync($request->get('researchers'));

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
