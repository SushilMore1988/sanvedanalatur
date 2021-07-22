<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Excel;
use DB;
use App\Http\Controllers\Controller;
use App\Imports\StateImport;
use App\Exports\StateExport;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index','store']]);
         $this->middleware('permission:state-create', ['only' => ['create','store']]);
         $this->middleware('permission:state-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::orderBy('id','DESC')->get();
        return view('state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create');
    }

    public function show($id)
    {
        $state = State::find($id);
        return view('state.show',compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name',
            'country_id' => 'required',
        ]);

        State::create(['name' => $request->name, 'country_id' => $request->country]);
    
    
        return redirect()->route('state.index')
                        ->with('success','State added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::find($id);
        return view('state.edit',compact('state'));
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
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
        ]);
    
        $state = State::find($id);
        $state->name = $request->input('name');
        $state->country_id = $request->input('country_id');
        $state->save();

        return redirect()->route('state.index')
                        ->with('success','State updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        State::find($id)->delete();
        return redirect()->route('state.index')
                        ->with('success','State deleted successfully');
    }
    function import(Request $request)
    //var_dump($request);die();
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'Name'  => $row['name'],
        'Country-id' =>$row['country_id'],   
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('states')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }

     public function exportIntoExcel()
        {
        return Excel::download(new StateExport,'statlist.xlsx');
     }
        public function exportIntoCSV(){
        return Excel::download(new StateExport,'statlist.csv');

    }

     public function imports(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new StateImport($country_id), request()->file('import_file'));
        return back()->with('success', 'States imported successfully.');
    }
 
    public function export() 
    {
        return Excel::download(new StateExport, 'states.xlsx');
    }
}
