<?php

namespace App\Http\Controllers\Researcher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ResearchStoreRequest;
use App\Http\Requests\ResearchUpdateRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Researcher;
use App\Unit;
use App\InvestigationGroup;


class ResearcherController extends Controller
{
    public static function researchers($id){
        return Researcher::where('id','=',$id)->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country = $request->get('country');

        $researchers = Researcher::orderBy('researcher_name','DESC')
        ->country($country)
        ->paginate();

        return view('researcher.index', compact('researchers'));
    }

    public function search(Request $request)
    {

        if($request->ajax()){


            $researchers = Researcher::where('country','LIKE','%'.$request->country."%")->get();


        }


        return view('researcher.index', compact('researchers'));
    }


    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('researchers')
         ->where('country', 'like', '%'.$query.'%')
        //  ->orWhere('Country', 'like', '%'.$query.'%')
         ->orderBy('researcher_name', 'desc')
         ->get();

      }
      else
      {
       $data = DB::table('researchers')
         ->orderBy('researcher_name', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->country.'</td>
         </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
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
        $researcher = Researcher::find($id);

        return view('researcher.show',compact('researcher'));
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
