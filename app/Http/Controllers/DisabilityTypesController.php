<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityType;
use App\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportDisability;
use App\Exports\ExportDisability;

use Spatie\Permission\Models\Permission;

class DisabilityTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:disability-type-list|disability-type-create|disability-type-edit|disability-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:disability-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:disability-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:disability-type-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disabilitypes = DisabilityType::orderBy('id','DESC')->get();
        return view('disability-types.index',compact('disabilitypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disability-types.create');
    }

    public function show($id)
    {
        $disabilitype = DisabilityType::find($id);
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
            'type' => 'required|unique:disability_types,type',
        ]);

        DisabilityType::create(['type' => $request->type]);
    
    
        return redirect()->route('disability-types.index')
                        ->with('success','Disability type added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disabilitype = DisabilityType::find($id);
        return view('disability-types.edit',compact('disabilitype'));
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
            'type' => 'required',
        ]);
    
        $disabilitype = DisabilityType::find($id);
        $disabilitype->type = $request->input('type');
        $disabilitype->save();

        return redirect()->route('disability-types.index')
                        ->with('success','Disability type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityType::find($id)->delete();
        return redirect()->route('disability-types.index')
                        ->with('success','Disability type deleted successfully');
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
                DB::table('disability_types')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportDisability,'Disability.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportDisability,'Disabilitylist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportDisability, request()->file('import_file'));
        return back()->with('success', 'Disability imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportDisability, 'Disability.xlsx');
    }


}
