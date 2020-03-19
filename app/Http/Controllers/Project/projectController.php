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

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    public function index()
    {
        $projects = Project::orderBy('id','DESC')->paginate();
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

        // $joins = DB::table('investigation_group_researcher')
            // ->join('researchers', 'investigation_group_researcher.researcher_id', '=', 'researchers.id')
            // ->join('investigation_groups', 'investigation_group_researcher.investigation_group_id', '=', 'investigation_groups.id')
            // ->select('researchers.*','investigation_groups.*')
            // ->pluck('researchers.researcher_name','investigation_groups.id');

        $researchers_group = Researcher::orderBy('researcher_name','ASC')->pluck('researcher_name');
        $researchers = Researcher::orderBy('researcher_name','ASC')->pluck('researcher_name');
        $investigation_groups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.projects.create',compact('researchers_group','researchers','investigation_groups'));
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
        //Validado en archivo externo
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
        return view('admin-invest.projects.show',compact('project'));
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
        $researchers = Researcher::orderBy('researcher_name','ASC')->get();
        $investigation_groups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.projects.edit',compact('project','researchers','investigation_groups'));
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
        //validado en archivo externo
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
