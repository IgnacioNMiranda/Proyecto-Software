<?php

namespace App\Http\Controllers\InvestigationGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\InvestigationGroupStoreRequest;
use App\Http\Requests\InvestigationGroupUpdateRequest;

use App\InvestigationGroup;
use App\Unit;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

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
        $units = Unit::orderBy('name','ASC')->get();

        $countries = countries();

        return view('Investigation_groups.create',compact('units','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestigationGroupStoreRequest $request)
    {
        //validacion con ayuda de InvestigationGroupStoreRequest
        
        $invGroup = InvestigationGroup::create($request->all());

        $invGroup->slug = Str::slug($invGroup->name);
        $invGroup->save();

        /*if(checkRut($invGroup->rut == false)){
            destroy($invGroup->id);
            return redirect()->route('InvestigationGroups.edit')->with('error','Rut mal ingresado');
        }
        */

        //Seccion de almacenamiento de logo
        if($request->file('logo')){
            $path = Storage::disk('public')->put('image', $request->file('logo'));
            $invGroup->fill(['logo' => asset($path)])->save();
        }
        //Asignacion n-n con unidades, attach para crear la relacion
        $invGroup->units()->attach($request->get('units'));

        return redirect()->route('investigationGroups.edit',$invGroup->id)->with('info','Grupo de investigación creado con exito!');
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

        return view('Investigation_groups.show',compact('invGroup'));
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

        $units = Unit::orderBy('name','ASC')->get();

        $countries = countries();

        return view('Investigation_groups.edit',compact('invGroup','units','countries'));
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

        $invGroup->slug = Str::slug($invGroup->name);
        $invGroup->save();

        //Seccion de almacenamiento de logo
        if($request->file('logo')){
            $path = Storage::disk('public')->put('image', $request->file('logo'));
            $invGroup->fill(['logo' => asset($path)])->save();
        }

        //Asignacion n-n con unidades, sync para actualizar la relacion invGroup con units
        $invGroup->units()->sync($request->get('units'));

        return redirect()->route('investigationGroups.edit', $invGroup->id)->with('info','Grupo de investigación actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invGroup = InvestigationGroup::find($id)->delete();

        return back()->with('info',$invGroup->name,' fue eliminado correctamente');
    }
}
