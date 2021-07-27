<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityArea;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportDisabilityArea;
use App\Exports\ExportDisabilityArea;

class DisabilityAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:disability-area-list|disability-area-create|disability-area-edit|disability-area-delete', ['only' => ['index','store']]);
         $this->middleware('permission:disability-area-create', ['only' => ['create','store']]);
         $this->middleware('permission:disability-area-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:disability-area-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disabilityareas = DisabilityArea::orderBy('id','DESC')->get();
        return view('disability-areas.index',compact('disabilityareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disability-areas.create');
    }

    public function show($id)
    {
        $disabilityarea = DisabilityArea::find($id);
        return view('roles.show',compact('identity'));
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
            'area' => 'required|unique:disability_areas,area',
        ]);

        DisabilityArea::create(['area' => $request->area]);
    
    
        return redirect()->route('disability-areas.index')
                        ->with('success','Disability Area added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disabilityarea = DisabilityArea::find($id);
        return view('disability-areas.edit',compact('disabilityarea'));
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
            'area' => 'required',
        ]);
    
        $disabilityarea = DisabilityArea::find($id);
        $disabilityarea->area = $request->input('area');
        $disabilityarea->save();

        return redirect()->route('disability-areas.index')
                        ->with('success','Disability area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityArea::find($id)->delete();
        return redirect()->route('disability-areas.index')
                        ->with('success','Disability area deleted successfully');
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
                DB::table('disability_areas')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportDisabilityArea,'Disability.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportDisabilityArea,'Disabilitylist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportDisabilityArea, request()->file('import_file'));
        return back()->with('success', 'Disability imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportDisabilityArea, 'Disability.xlsx');
    }


}
