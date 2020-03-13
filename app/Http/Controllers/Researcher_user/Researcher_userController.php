<?php

namespace App\Http\Controllers\Researcher_user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Research_userStoreRequest;
use App\Http\Requests\Research_userUpdateRequest;

use App\Researcher;
use App\Unit;
use App\User;

class Researcher_userController extends Controller
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
        $units = Unit::orderBy('name','ASC')->pluck('name','id');
        return view('researcher_user.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Research_userStoreRequest $request)
    {
        $researcher = Researcher::create($request->all());

        $researcher->passport = $request->passport;
        $researcher->save();

        $currentUser = User::find(Auth::user()->id);
        $currentUser->researcher_id = $researcher->id;
        $researcher->passport = $request->passport;
        $researcher->save();
        $currentUser->save();
        
        return back()->with('info','Perfil editado con exito!');
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
        $researcher = Researcher::find($id);
        $units = Unit::orderBy('name','ASC')->pluck('name','id');

        return view('researcher_user.edit', compact('researcher','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Research_userUpdateRequest $request, $id)
    {
        $researcher = Researcher::find($id);
        $researcher->passport = $request->passport;
        $researcher->save();
        $researcher->fill($request->all())->save();

        $researcher->passport = $request->passport;
        $researcher->save();

        return redirect()->route('researchers_users.edit', $researcher->id)->with('info','Perfil actualizado con exito!');
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
