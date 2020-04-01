<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Project;
use App\Researcher;
use App\InvestigationGroup;
use App\Unit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;


class productController extends Controller
{

    /* Redirige a iniciar sesion si se intenta ingresar
    a la url sin haber ingresado sesion
    */
    public function __construct()
    {
        $this->middleware('auth')->except('index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')
        ->paginate();
        return view('admin-invest.products.index',compact('products'));
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
                return back()->withErrors(['Debe asociarse a un grupo de investigación antes de crear productos.']);
            }
        }

        return view('admin-invest.products.create', compact('invGroups','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //validar campos obligatorios
        $product = Product::create($request->all());
        $product->slug = Str::slug($product->name);
        $product->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $productResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $productResearchers = $request->get('researchers');
        }

        //Asignacion n-n con researchers, attach para crear la relacion
        $product->researchers()->attach($productResearchers);

        return redirect()->route('products.create')
            ->with('info', 'Producto creado con éxito');
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
        $product = Product::find($id);
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name', 'id');
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        return view('admin-invest.products.edit', compact('product','invGroups','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        //validar campos obligatorios
        $product = Product::find($id);
        $product -> fill($request->all())->save();

        $product->slug = Str::slug($product->name);
        $request->project_id == null ? $product->project_id = null : '';

        $product->save();

        //Merge de arreglos de investigadores
        if($request->get('notResearchers') != null){
            $productResearchers = array_merge($request->get('researchers'), $request->get('notResearchers'));
        }else{
            $productResearchers = $request->get('researchers');
        }
        
        //Asignacion n-n con researcher, sync para actualizar la relacion products con researchers
        $product->researchers()->sync($productResearchers);

        return redirect()->route('products.edit', $product->id)
            ->with('info', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');

    }
}
