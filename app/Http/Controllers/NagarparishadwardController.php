<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahanagarpalika;
use App\Models\Nagarparishad;
use App\Models\NagarparishadWardNumber;
use App\Models\State;
use App\Models\Country;
use App\Models\District;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportNagarparishadWard;
use App\Exports\ExportNagarparishadWard;

class NagarparishadwardController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:nagarparishadward-list|nagarparishadward-create|nagarparishadward-edit|nagarparishadward-delete', ['only' => ['index','store']]);
         $this->middleware('permission:nagarparishadward-create', ['only' => ['create','store']]);
         $this->middleware('permission:nagarparishadward-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:nagarparishadward-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $nagarparishadwards = Nagarparishadward::orderBy('id','DESC')->get();
        return view('nagarparishadward.index',compact('nagarparishadwards'));
    }
    public function create()
    {
        return view('nagarparishadward.create');
    }
    public function show($id)
    {
        $nagarparishadwards = Nagarparishadward::find($id);
        return view('nagarparishadward.show',compact('nagarparishadwards'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:nagarpalikas,name',
            'state_id' => 'required',
            'country_id' => 'required',
            'taluka_id' => 'required',
        ]);

        Nagarpalika::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state,'taluka_id'=>$request->taluka,'nagarparishad_id'=>$request->nagarparishadward]);


        return redirect()->route('nagarparishadward.index')
                        ->with('success','nagarparishadward added successfully');
    }
    public function edit($id)
    {
        $nagarparishadward = Nagarparishadward::find($id);
        return view('nagarparishadward.edit',compact('nagarparishadward'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'taluka_id' => 'required',
            'nagarparishad_id' => 'required',

        ]);

        $nagarparishadward = Nagarparishadward::find($id);
        $nagarparishadward->name = $request->input('name');
        $nagarparishadward->country_id = $request->input('country_id');
        $nagarparishadward->state_id = $request->input('state_id');
        $nagarparishadward->taluka_id = $request->input('taluka_id');
        $nagarparishadward->nagarparishad_id = $request->input('nagarparishad_id');
        $nagarparishadward->save();

        return redirect()->route('nagarparishadward.index')
                        ->with('success','nagarparishadward updated successfully');
    }
    public function destroy($id)
    {
        Nagarparishadward::find($id)->delete();
        return redirect()->route('nagarparishadward.index')
                        ->with('success','nagarparishadward deleted successfully');
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
                DB::table('nagarparishad_ward_numbers')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

            public function exportIntoExcel()
            {
                return Excel::download(new ExportNagarparishadWard,'Nagarparishad.xlsx');
            }
            
            public function exportIntoCSV(){
                return Excel::download(new ExportNagarparishadWard,'Nagarparishad.csv');
            }

            public function imports(Request $request){
                $request->validate([
                    'import_file' => 'required'
                ]);
                Excel::import(new ImportNagarparishadWard, request()->file('import_file'));
                return back()->with('success', 'Nagarparishad imported successfully.');
            }
        
            public function export() 
            {
                return Excel::download(new ExportNagarparishadWard, 'Nagarparishad.xlsx');
            }
}
