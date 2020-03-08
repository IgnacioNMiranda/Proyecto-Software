<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Project;
use App\Researcher;
use App\InvestigationGroup;

class productController extends Controller
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
    public function index()
    {
        $products = Product::orderBy('id','DESC')
        ->where('user_id',auth()->user()->id)
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
        $projects = Project::orderBy('name','ASC')->pluck('name','id');
        $researchers = Researcher::orderBy('name','ASC')->pluck('name','id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name','id');
        
        return view('admin-invest.products.create', compact('projects', 'researchers', 'invGroups'));
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
        $product =Product::create($request->all());
        $product->slug = Str::slug($product->name);
        return redirect()->route('admin-invest.products.edit', $product->id)
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
        $product = Product::find($id);
        return view('admin-invest.products.show', compact('product'));
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
        $projects = Project::orderBy('name','ASC')->pluck('name','id');
        $researchers = Researcher::orderBy('name','ASC')->pluck('name', 'id');
        $invGroups = InvestigationGroup::orderBy('name','ASC')->pluck('name', 'id');
        return view('admin-invest.products.edit', compact('product','projects','researchers','invGroups'));
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
        return redirect()->route('admin-invest.products.edit', $product->id)
            ->with('info', 'Producto actualizada con éxito');
    
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
