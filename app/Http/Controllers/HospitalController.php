<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportHospital;
use App\Exports\ExportHospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:hospital-list|hospital-create|hospital-edit|hospital-delete', ['only' => ['index','store']]);
         $this->middleware('permission:hospital-create', ['only' => ['create','store']]);
         $this->middleware('permission:hospital-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:hospital-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hospitals = Hospital::orderBy('id','DESC')->get();
        return view('hospitals.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospitals.create');
    }

    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitals.show',compact('hospital'));
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
            'name' => 'required|unique:hospitals,name',
        ]);

        Hospital::create(['name' => $request->name]);
    
    
        return redirect()->route('hospitals.index')
                        ->with('success','Hospital added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitals.edit',compact('hospital'));
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
    
        $hospital = Hospital::find($id);
        $hospital->name = $request->input('name');
        $hospital->save();

        return redirect()->route('hospitals.index')
                        ->with('success','Hospital updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hospital::find($id)->delete();
        return redirect()->route('hospitals.index')
                        ->with('success','Hospital deleted successfully');
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
                DB::table('hospitals')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportHospital,'Hospital.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportHospital,'Hospitallist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportHospital, request()->file('import_file'));
        return back()->with('success', 'Hospital imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportHospital, 'Hospital.xlsx');
    }


}
