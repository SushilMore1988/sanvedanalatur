<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;
use App\Models\Village;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportVillage;
use App\Exports\ExportVillage;

class VillageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:village-list|village-create|village-edit|vilage-delete', ['only' => ['index','store']]);
         $this->middleware('permission:village-create', ['only' => ['create','store']]);
         $this->middleware('permission:village-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:village-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $villages = Village::orderBy('id','DESC')->get();
        return view('village.index',compact('villages'));
    }
    public function create()
    {
        return view('village.create');
    }
    public function show($id)
    {
        $village = Village::find($id);
        return view('village.show',compact('village'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:villages,name',
            'state_id' => 'required',
            'district_id' => 'required',
            'taluka_id' => 'required',
            'country_id' => 'required',
        ]);

        Village::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state, 'district_id' => $request->district, 'taluka_id' => $request->taluka]);


        return redirect()->route('village.index')
                        ->with('success','Village added successfully');
    }
    public function edit($id)
    {
        $village = Village::find($id);
        return view('village.edit',compact('village'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
            'taluka_id' => 'required',
        ]);

        $village = Village::find($id);
        $village->name = $request->input('name');
        $village->country_id = $request->input('country_id');
        $village->state_id = $request->input('state_id');
        $village->district_id = $request->input('district_id');
        $village->taluka_id = $request->input('taluka_id');
        $village->save();

        return redirect()->route('village.index')
                        ->with('success','Village updated successfully');
    }
    public function destroy($id)
    {
        Village::find($id)->delete();
        return redirect()->route('village.index')
                        ->with('success','Village deleted successfully');
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
                    'taluka-id' =>$row['taluka_id'],   
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('villages')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

            public function exportIntoExcel()
            {
                return Excel::download(new ExportViilage,'village.xlsx');
            }
            
            public function exportIntoCSV(){
                return Excel::download(new ExportViilage,'villagelist.csv');
            }

            public function imports(Request $request){
                $request->validate([
                    'import_file' => 'required'
                ]);
                Excel::import(new ImportVillage, request()->file('import_file'));
                return back()->with('success', 'Village imported successfully.');
            }
        
            public function export() 
            {
                return Excel::download(new ExportVillage, 'village.xlsx');
            }
}


