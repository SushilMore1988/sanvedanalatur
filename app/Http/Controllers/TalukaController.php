<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportTaluka;
use App\Exports\ExportTaluka;


class TalukaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:taluka-list|taluka-create|taluka-edit|taluka-delete', ['only' => ['index','store']]);
         $this->middleware('permission:taluka-create', ['only' => ['create','store']]);
         $this->middleware('permission:taluka-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:taluka-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $talukas = Taluka::orderBy('id','DESC')->get();
        return view('taluka.index',compact('talukas'));
    }
    public function create()
    {
        return view('taluka.create');
    }
    public function show($id)
    {
        $taluka = Taluka::find($id);
        return view('taluka.show',compact('taluka'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:talukas,name',
            'state_id' => 'required',
            'district_id' => 'required',
            'country_id' => 'required',
        ]);

        Taluka::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state, 'district_id' => $request->district]);


        return redirect()->route('taluka.index')
                        ->with('success','Taluka added successfully');
    }
    public function edit($id)
    {
        $taluka = Taluka::find($id);
        return view('taluka.edit',compact('taluka'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
        ]);

        $taluka = Taluka::find($id);
        $taluka->name = $request->input('name');
        $taluka->country_id = $request->input('country_id');
        $taluka->state_id = $request->input('state_id');
        $taluka->district_id = $request->input('district_id');
        $taluka->save();

        return redirect()->route('taluka.index')
                        ->with('success','Taluka updated successfully');
    }
    public function destroy($id)
    {
        Taluka::find($id)->delete();
        return redirect()->route('taluka.index')
                        ->with('success','Taluka deleted successfully');
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
                    'District-id' =>$row['district_id'],   
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('talukas')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportTaluka,'Taluka.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportTaluka,'Talukalist.csv');
    }

    public function imports(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportTaluka, request()->file('import_file'));
        return back()->with('success', 'Taluka imported successfully.');
    }
 
    public function export() 
    {
        return Excel::download(new ExportTaluka, 'states.xlsx');
    }

}


