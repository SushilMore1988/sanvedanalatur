<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportDistrict;
use App\Exports\ExportDistrict;

class DistrictController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:district-list|district-create|district-edit|district-delete', ['only' => ['index','store']]);
         $this->middleware('permission:district-create', ['only' => ['create','store']]);
         $this->middleware('permission:district-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:district-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $districts = District::orderBy('id','DESC')->get();
        return view('district.index',compact('districts'));
    }
    public function create()
    {
        return view('district.create');
    }
    public function show($id)
    {
        $district = District::find($id);
        return view('district.show',compact('district'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        District::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state]);


        return redirect()->route('district.index')
                        ->with('success','District added successfully');
    }
    public function edit($id)
    {
        $district = District::find($id);
        return view('district.edit',compact('district'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);

        $district = District::find($id);
        $district->name = $request->input('name');
        $district->country_id = $request->input('country_id');
        $district->state_id = $request->input('state_id');
        $district->save();

        return redirect()->route('district.index')
                        ->with('success','District updated successfully');
    }
    public function destroy($id)
    {
        District::find($id)->delete();
        return redirect()->route('district.index')
                        ->with('success','District deleted successfully');
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
                    'Name'  => $row['name'],
                    'State-id' =>$row['state_id'],   
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('districts')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportDistrict,'district.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportDistrict,'districtlist.csv');
    }

    public function imports(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportDistrict, request()->file('import_file'));
        return back()->with('success', 'District imported successfully.');
    }
 
    public function export() 
    {
        return Excel::download(new ExportDistrict, 'District.xlsx');
    }

}


