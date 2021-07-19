<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressProof;
use App\Models\Role;
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
}
