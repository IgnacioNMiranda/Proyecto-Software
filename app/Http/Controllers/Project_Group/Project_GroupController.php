<?php

namespace App\Http\Controllers\Project_Group;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\InvestigationGroup;
use App\User;
use App\Researcher;

class Project_GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if(Auth::user() != null){
            $currentUser = User::find(Auth::user()->id);
        }else{ $currentUser = null; }

        $projects = Project::state($request->get('state'))->orderBy('id','DESC')->get();
        $invProjects = array();
        foreach ($projects as $project) {
            if($project->investigation_group_id == $id){
                $invProjects[$project->id] = $project;
            }
        }

        $ids = InvestigationGroup::find($id)->researchers()->pluck('researcher_id');
        $researchers = array();
        foreach ($ids as $clave => $valor) {
            $researcher = Researcher::find($valor);
            $researchers[$researcher->id] = $researcher;
            
        }
        return view('project_group.show', compact('invProjects','currentUser','researchers','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
