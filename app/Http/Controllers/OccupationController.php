<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupation;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportOccupation;
use App\Exports\ExportOccupation;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:occupation-list|occupation-create|occupation-edit|occupation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:occupation-create', ['only' => ['create','store']]);
         $this->middleware('permission:occupation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:occupation-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $occupations = Occupation::orderBy('id','DESC')->get();
        return view('occupations.index',compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occupations.create');
    }

    public function show($id)
    {
        $occupation = Occupation::find($id);
        return view('occupations.show',compact('occupation'));
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
            'name' => 'required|unique:occupations,name',
        ]);

        Occupation::create(['name' => $request->name]);
    
    
        return redirect()->route('occupations.index')
                        ->with('success','Occupation added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupation = Occupation::find($id);
        return view('occupations.edit',compact('occupation'));
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
        ]);
    
        $occupation = Occupation::find($id);
        $occupation->name = $request->input('name');
        $occupation->save();

        return redirect()->route('occupations.index')
                        ->with('success','Occupation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Occupation::find($id)->delete();
        return redirect()->route('occupations.index')
                        ->with('success','Occupation deleted successfully');
    }
    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value){
                foreach($value as $row){
                    $insert_data[] = array(
                    'type'  => $row['type'],
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('occupations')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportOccupation,'Occupation.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportOccupation,'Occupationlist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportOccupation, request()->file('import_file'));
        return back()->with('success', 'Occupation imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportOccupation, 'Occupation.xlsx');
    }



}
