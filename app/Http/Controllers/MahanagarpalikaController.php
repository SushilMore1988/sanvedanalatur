<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahanagarpalika;
use App\Models\State;
use App\Models\District;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportMahanagarpalika;
use App\Exports\ExportMahanagarpalika;

class MahanagarpalikaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mahanagarpalika-list|mahanagarpalika-create|mahanagarpalika-edit|mahanagarpalika-delete', ['only' => ['index','store']]);
         $this->middleware('permission:mahanagarpalika-create', ['only' => ['create','store']]);
         $this->middleware('permission:mahanagarpalika-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mahanagarpalika-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $mahanagarpalikas = Mahanagarpalika::orderBy('id','DESC')->get();
        return view('mahanagarpalika.index',compact('mahanagarpalikas'));
    }
    public function create()
    {
        return view('mahanagarpalika.create');
    }
    public function show($id)
    {
        $mahanagarpalika = Mahanagarpalika::find($id);
        return view('mahanagarpalika.show',compact('mahanagarpalika'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:mahanagarpalikas,name',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        Mahanagarpalika::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state]);


        return redirect()->route('mahanagarpalika.index')
                        ->with('success','mahanagarpalika added successfully');
    }
    public function edit($id)
    {
        $mahanagarpalika = Mahanagarpalika::find($id);
        return view('mahanagarpalika.edit',compact('mahanagarpalika'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);

        $mahanagarpalika = Mahanagarpalika::find($id);
        $mahanagarpalika->name = $request->input('name');
        $mahanagarpalika->country_id = $request->input('country_id');
        $mahanagarpalika->state_id = $request->input('state_id');
        $mahanagarpalika->save();

        return redirect()->route('mahanagarpalika.index')
                        ->with('success','mahanagarpalika updated successfully');
    }
    public function destroy($id)
    {
        Mahanagarpalika::find($id)->delete();
        return redirect()->route('mahanagarpalika.index')
                        ->with('success','mahanagarpalika deleted successfully');
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
                DB::table('mahanagarpalikas')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

            public function exportIntoExcel()
            {
                return Excel::download(new ExportMahanagarpalika,'Mahanagarpalika.xlsx');
            }
            
            public function exportIntoCSV(){
                return Excel::download(new ExportMahanagarpalika,'Mahanagarpalikalist.csv');
            }

            public function imports(Request $request){
                $request->validate([
                    'import_file' => 'required'
                ]);
                Excel::import(new ImportMahanagarpalika, request()->file('import_file'));
                return back()->with('success', 'Mahanagarpalika imported successfully.');
            }
        
            public function export() 
            {
                return Excel::download(new ExportMahanagarpalika, 'Mahanagarpalika.xlsx');
            }
}
