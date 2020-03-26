<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Researcher;
use App\Unit;

use App\Http\Requests\ResearchStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('checkRole');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createResearcherAccount($id){
        return view('User.create', compact('id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();

        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validator = new EmailValidator();
        $result = $validator->isValid($request->email, new RFCValidation());
        if(!$result){
            return back()->withErrors(['Formato de email inválido.']);
        }

        $user = User::create($request->all());

        //Permite que la clave del usuario se hashee y permite el logueo
        $user->password = Hash::make($request->password);
        $user->save();

        if($request->researcher_id){
            $AttachedResearcher = Researcher::find($request->researcher_id);
            $user->researcher()->associate($AttachedResearcher);
            $user->save();
        }

        //No debe redirect al edit ya que un usuario no se puede editar
        return redirect()->route('users.create')->with('info','Usuario creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearchStoreRequest $request, $id)
    {
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
