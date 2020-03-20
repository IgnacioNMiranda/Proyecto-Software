<?php

namespace App\Http\Controllers\InvestigationGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\InvestigationGroupStoreRequest;
use App\Http\Requests\InvestigationGroupUpdateRequest;

use App\InvestigationGroup;
use App\Unit;
use App\Researcher;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use Image;

class InvestigationGroupController extends Controller
{

    public function getResearchers(Request $request, $id){
        if($request->ajax()){
            $researchers = InvestigationGroup::find($id)->researchers;
            return response()->json($researchers);
        }
    }

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
        return('hola');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::orderBy('name','ASC')->pluck('name','id');

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

        //Seccion de almacenamiento de logo
        if($request->file('logo')){

            //Se obtiene la imagen del request, la cual fue enviada en un form
            $originalLogo = $request->file('logo');

            // Crear instancia del logo
            $logo = Image::make($originalLogo);

            //Se redimensiona a 300x300
            $logo->resize(300,300);

            // Guardar logo en carpeta public/images
            $path = Storage::disk('public')->put('images', $request->file('logo'));

            // save( [ruta], [calidad])
            $logo->save($path, 100);
            
            // ruta de las imagenes guardadas
            $invGroup->fill(['logo' => asset($path)])->save();
        }
        else{
            $invGroup->fill(['logo' => asset('systemImages/signos_interrogacion.png')])->save();
        }
        
        //Asignacion n-n con unidades, attach para crear la relacion
        $invGroup->units()->attach($request->get('units'));

        return redirect()->route('investigationGroups.create')->with('info','Grupo de investigación creado con exito!');
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

        return view('Investigation_groups.showDetail',compact('invGroup'));
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

        $units = Unit::orderBy('name','ASC')->pluck('name','id');

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
            
            //Se obtiene la imagen del request, la cual fue enviada en un form
            $originalLogo = $request->file('logo');

            // Crear instancia del logo
            $logo = Image::make($originalLogo);

            //Se redimensiona a 300x300
            $logo->resize(300,300);
            
            // Guardar logo en carpeta public/images
            $path = Storage::disk('public')->put('images', $request->file('logo'));

            // save( [ruta], [calidad])
            $logo->save($path, 100);
            
            // ruta de las imagenes guardadas
            $invGroup->fill(['logo' => asset($path)])->save();
        }

        //Asignacion n-n con unidades, sync para actualizar la relacion invGroup con units
        $invGroup->units()->sync($request->get('units'));

        return back()->with('info','Grupo de investigación actualizado con exito!');
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