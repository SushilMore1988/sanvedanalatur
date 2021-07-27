<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahanagarpalika;
use App\Models\Nagarparishad;
use App\Models\State;
use App\Models\District;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportNagarparishad;
use App\Exports\ExportNagarparishad;

class NagarpalikaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:nagarpalika-list|nagarpalika-create|nagarpalika-edit|nagarpalika-delete', ['only' => ['index','store']]);
         $this->middleware('permission:nagarpalika-create', ['only' => ['create','store']]);
         $this->middleware('permission:nagarpalika-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:nagarpalika-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $nagarpalikas = Nagarpalika::orderBy('id','DESC')->get();
        return view('nagarpalika.index',compact('nagarpalikas'));
    }
    public function create()
    {
        return view('nagarpalika.create');
    }
    public function show($id)
    {
        $nagarpalikas = Nagarpalika::find($id);
        return view('nagarpalika.show',compact('nagarpalikas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:nagarpalikas,name',
            'state_id' => 'required',
            'country_id' => 'required',
            'taluka_id' => 'required',
        ]);

        Nagarpalika::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state,'taluka_id'=>$request->taluka]);


        return redirect()->route('nagarpalika.index')
                        ->with('success','nagarpalika added successfully');
    }
    public function edit($id)
    {
        $nagarpalika = Nagarpalika::find($id);
        return view('nagarpalika.edit',compact('nagarpalika'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'taluka_id' => 'required',

        ]);

        $nagarpalika = Nagarpalika::find($id);
        $nagarpalika->name = $request->input('name');
        $nagarpalika->country_id = $request->input('country_id');
        $nagarpalika->state_id = $request->input('state_id');
        $nagarpalika->taluka_id = $request->input('taluka_id');
        $nagarpalika->save();

        return redirect()->route('nagarpalika.index')
                        ->with('success','nagarpalika updated successfully');
    }
    public function destroy($id)
    {
        Nagarpalika::find($id)->delete();
        return redirect()->route('nagarpalika.index')
                        ->with('success','nagarpalika deleted successfully');
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
                DB::table('nagarparishads')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

            public function exportIntoExcel()
            {
                return Excel::download(new ExportNagarparishad,'Nagarparishad.xlsx');
            }
            
            public function exportIntoCSV(){
                return Excel::download(new ExportNagarparishad,'Nagarparishad.csv');
            }

            public function imports(Request $request){
                $request->validate([
                    'import_file' => 'required'
                ]);
                Excel::import(new ImportNagarparishad, request()->file('import_file'));
                return back()->with('success', 'Nagarparishad imported successfully.');
            }
        
            public function export() 
            {
                return Excel::download(new ExportNagarparishad, 'Nagarparishad.xlsx');
            }
}
