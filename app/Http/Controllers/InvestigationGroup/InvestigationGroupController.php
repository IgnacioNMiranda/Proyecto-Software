<?php

namespace App\Http\Controllers\InvestigationGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\InvestigationGroupStoreRequest;
use App\Http\Requests\InvestigationGroupUpdateRequest;

class InvestigationGroupController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
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
        return view('Investigation_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestigationGroupStoreRequest $request)
    {
        //validar
        $invGroup = InvestigationGroup::create($request->all());

        return redirect()->route('InvestigationGroups.edit', $invGroup->id)->with('info','Grupo de investigación creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invGroup = InvestigationGroup::find($id);

        return view('InvestigationGroups.show',compact('invGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invGroup = InvestigationGroup::find($id);

        return view('InvestigationGroups.edit',compact('invGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvestigationGroupUpdateRequest $request, $id)
    {
        //validar
        $invGroup = InvestigationGroup::find($id);

        $invGroup->fill($request->all())->save();

        return redirect()->route('InvestigationGroups.edit', $invGroup->id)->with('info','Grupo de investigación actualizado con exito!');

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
