<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressProof;
use App\Models\Role;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportAddress;
use App\Exports\ExportAddress;
use Spatie\Permission\Models\Permission;

class AddressController extends Controller
{
    public $addresses, $name, $address;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:address-proof-list|address-proof-create|address-proof-edit|address-proof-delete', ['only' => ['index','store']]);
         $this->middleware('permission:address-proof-create', ['only' => ['create','store']]);
         $this->middleware('permission:address-proof-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:address-proof-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $addresses = AddressProof::orderBy('id','DESC')->get();
        return view('address-proofs.index',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address-proofs.create');
    }

    public function show($id)
    {
        $address = AddressProof::find($id);
        return view('roles.show',compact('address'));
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
            'name' => 'required|unique:address_proofs,name',
        ]);

        AddressProof::create(['name' => $request->name]);
    
    
        return redirect()->route('address-proofs.index')
                        ->with('success','address-proof added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = AddressProof::find($id);
        return view('address-proofs.edit',compact('address'));
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
    
        $address = AddressProof::find($id);
        $address->name = $request->input('name');
        $address->save();

        return redirect()->route('address-proofs.index')
                        ->with('success','address-proof updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AddressProof::find($id)->delete();
        return redirect()->route('address-proofs.index')
                        ->with('success','address-proof deleted successfully');
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
                DB::table('address_proofs')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportAddress,'Address.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportAddress,'Addresslist.csv');
    }

    public function importe(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportAddress, request()->file('import_file'));
        return back()->with('success', 'Address imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportAddress, 'Address.xlsx');
    }


}
