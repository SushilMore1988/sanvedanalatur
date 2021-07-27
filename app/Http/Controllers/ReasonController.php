<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityReason;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportReason;
use App\Exports\ExportReason;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:disability-reason-list|disability-reason-create|disability-reason-edit|disability-reason-delete', ['only' => ['index','store']]);
         $this->middleware('permission:disability-reason-create', ['only' => ['create','store']]);
         $this->middleware('permission:disability-reason-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:disability-reason-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reasons = DisabilityReason::orderBy('id','DESC')->get();
        return view('disability-reasons.index',compact('reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disability-reasons.create');
    }

    public function show($id)
    {
        $reason = DisabilityReason::find($id);
        return view('roles.show',compact('reason'));
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
            'reason' => 'required|unique:disability_reasons,reason',
        ]);

        DisabilityReason::create(['reason' => $request->reason]);
    
    
        return redirect()->route('disability-reasons.index')
                        ->with('success','Disability reason added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reason = DisabilityReason::find($id);
        return view('disability-reasons.edit',compact('reason'));
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
            'reason' => 'required',
        ]);
    
        $reason = DisabilityReason::find($id);
        $reason->reason = $request->input('reason');
        $reason->save();

        return redirect()->route('disability-reasons.index')
                        ->with('success','Disability reason updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityReason::find($id)->delete();
        return redirect()->route('disability-reasons.index')
                        ->with('success','Disability reason deleted successfully');
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
                DB::table('disability_reasons')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportReason,'Reason.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportReason,'Reasonlist.csv');
    }

    public function importes(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportReason, request()->file('import_file'));
        return back()->with('success', 'Reason imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportReason, 'Reason.xlsx');
    }


}
