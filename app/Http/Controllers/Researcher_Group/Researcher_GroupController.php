<?php

namespace App\Http\Controllers\Researcher_Group;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use App\Researcher;
use App\InvestigationGroup;
use App\User;

class Researcher_GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {

        $currentUser = User::find(Auth::user()->id);
        $ids = InvestigationGroup::find($id)->researchers()->pluck('researcher_id');
        $researchers = array();
        foreach ($ids as $clave => $valor) {
            $researcher = Researcher::find($valor);
            $researchers[$researcher->id] = $researcher;

        }
        $country = $request->get('country');

        $researchers_groups= Researcher::orderBy('researcher_name','DESC')
        ->country($country)
        ->paginate();

        return view('researcher_group.index', compact('researchers','currentUser'));


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
    public function show($id)
    {
        $currentUser = User::find(Auth::user()->id);
        $ids = InvestigationGroup::find($id)->researchers()->pluck('researcher_id');
        $researchers = array();
        foreach ($ids as $clave => $valor) {
            $researcher = Researcher::find($valor);
            $researchers[$researcher->id] = $researcher;

        }

        return view('researcher_group.show', compact('researchers','currentUser'));
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
