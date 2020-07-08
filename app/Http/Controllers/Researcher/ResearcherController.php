<?php

namespace App\Http\Controllers\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResearchStoreRequest;
use App\Http\Requests\ResearchUpdateRequest;
use App\Researcher;
use App\Unit;
use App\InvestigationGroup;


class ResearcherController extends Controller
{
    public function __construct(){

        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = $request->get('country');
        
        if($request->get('unit') != null){
            $unit_id = current(Unit::where('name', $request->get('unit'))->pluck('id')->all());
            if(!$unit_id){
                $unit_id = ' ';
            }
        }else{
            $unit_id = $request->get('unit');
        }

        $researchers = Researcher::orderBy('researcher_name','DESC')
        ->country($country)
        ->unit($unit_id)
        ->paginate();

        return view('researcher.index', compact('researchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        if(Auth::user()->userType == "Investigador"){
            if(Auth::user()->researcher_id != null){
                $invGroups = Researcher::find(Auth::user()->researcher_id)->investigation_groups()->get()->pluck('name', 'id');
            }else{
                return back()->withErrors(['Debe asociarse a un grupo de investigación antes de crear investigadores.']);
            }
        }

        return view('researcher.create', compact('units','invGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResearchStoreRequest $request)
    {
        $researcher = Researcher::create($request->all());
        $researcher->passport = $request->passport;
        $researcher->save();

        $researcher->investigation_groups()->attach($request->get('investigation_groups'));


        return back()->with('info','Investigador creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->userType=="Administrador"){ $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id'); }
        else{
            $ids = Researcher::find(Auth::user()->researcher_id)->investigation_groups()->pluck('investigation_group_id');
            $invGroups = array();
            foreach ($ids as $clave => $valor) {
                $invGroup = InvestigationGroup::find($valor);
                $invGroups[$invGroup->id] = $invGroup->name;

            }
        }
        $researcher = Researcher::find($id);
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');

        return view('researcher.edit', compact('researcher','units','invGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearchUpdateRequest $request, $id)
    {
        //validar
        $researcher = Researcher::find($id);

        $researcher->fill($request->all())->save();

        $researcher->passport = $request->passport;
        $researcher->save();

        $researcher->investigation_groups()->sync($request->get('investigation_groups'));


        return redirect()->route('researchers.edit', $researcher->id)->with('info','Investigador actualizado con exito!');
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
