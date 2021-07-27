<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentityProof;
use App\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportIdentity;
use App\Exports\ExportIdentity;
use Spatie\Permission\Models\Permission;

class IdentityController extends Controller
{
    public $identities, $name, $identity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:identity-proof-list|identity-proof-create|identity-proof-edit|identity-proof-delete', ['only' => ['index','store']]);
         $this->middleware('permission:identity-proof-create', ['only' => ['create','store']]);
         $this->middleware('permission:identity-proof-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:identity-proof-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $identities = IdentityProof::orderBy('id','DESC')->get();
        return view('identity-proofs.index',compact('identities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('identity-proofs.create');
    }

    public function show($id)
    {
        $identity = IdentityProof::find($id);
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
            'name' => 'required|unique:identity_proofs,name',
        ]);

        IdentityProof::create(['name' => $request->name]);
    
    
        return redirect()->route('identity-proofs.index')
                        ->with('success','Identity-proof added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $identity = IdentityProof::find($id);
        return view('identity-proofs.edit',compact('identity'));
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
            'name' => 'required',
        ]);
    
        $identity = IdentityProof::find($id);
        $identity->name = $request->input('name');
        $identity->save();

        return redirect()->route('identity-proofs.index')
                        ->with('success','Identity-proof updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IdentityProof::find($id)->delete();
        return redirect()->route('identity-proofs.index')
                        ->with('success','Identity-proof deleted successfully');
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
                DB::table('identity_proofs')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportIdentity,'Identity.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportIdentity,'Identitylist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportIdentity, request()->file('import_file'));
        return back()->with('success', 'Identity imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportIdentity, 'Identity.xlsx');
    }

}
