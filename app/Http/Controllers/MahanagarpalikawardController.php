<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahanagarpalika;
use App\Models\State;
use App\Models\Country;
use App\Models\District;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;  
use App\Http\Controllers\Controller;
use App\Imports\ImportMahanagarpalikaward;
use App\Exports\ExportMahanagarpalikaward;

class MahanagarpalikawardController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mahanagarpalikaward-list|mahanagarpalikaward-create|mahanagarpalikaward-edit|mahanagarpalikaward-delete', ['only' => ['index','store']]);
         $this->middleware('permission:mahanagarpalikaward-create', ['only' => ['create','store']]);
         $this->middleware('permission:mahanagarpalikaward-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mahanagarpalikaward-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $mahanagarpalikawards = Mahanagarpalikaward::orderBy('id','DESC')->get();
        return view('mahanagarpalika.index',compact('mahanagarpalikawards'));
    }
    public function create()
    {
        return view('mahanagarpalika.create');
    }
    public function show($id)
    {
        $mahanagarpalikawards = Mahanagarpalikaward::find($id);
        return view('mahanagarpalika.show',compact('mahanagarpalikawards'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:mahanagarpalikawards,name',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        Mahanagarpalikaward::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state]);


        return redirect()->route('mahanagarpalika.index')
                        ->with('success','Mahanagarpalikaward added successfully');
    }
    public function edit($id)
    {
        $mahanagarpalikawards = Mahanagarpalikaward::find($id);
        return view('mahanagarpalika.edit',compact('mahanagarpalikawards'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);

        $mahanagarpalikawards = Mahanagarpalikaward::find($id);
        $mahanagarpalikawards->name = $request->input('name');
        $mahanagarpalikawards->country_id = $request->input('country_id');
        $mahanagarpalikawards->state_id = $request->input('state_id');
        $mahanagarpalika->save();

        return redirect()->route('mahanagarpalika.index')
                        ->with('success','mahanagarpalikawards updated successfully');
    }
    public function destroy($id)
    {
        Mahanagarpalikaward::find($id)->delete();
        return redirect()->route('mahanagarpalika.index')
                        ->with('success','mahanagarpalikawards deleted successfully');
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
                    'mahanagarpalika_id'=>$row['mahanagarpalika_id'],  
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('mahanagarpalika_ward_numbers')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

            public function exportIntoExcel()
            {
                return Excel::download(new ExportMahanagarpalikaward,'Mahanagarpalikaward.xlsx');
            }
            
            public function exportIntoCSV(){
                return Excel::download(new ExportMahanagarpalikaward,'Mahanagarpalikawardlist.csv');
            }

            public function imports(Request $request){
                $request->validate([
                    'import_file' => 'required'
                ]);
                Excel::import(new ImportMahanagarpalikaward, request()->file('import_file'));
                return back()->with('success', 'Mahanagarpalikaward imported successfully.');
            }
        
            public function export() 
            {
                return Excel::download(new ExportMahanagarpalikaward, 'Mahanagarpalikaward.xlsx');
            }
}
