<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityType;
use App\Models\Role;
use Spatie\Permission\Models\Permission;

class DisabilityTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:disability-type-list|disability-type-create|disability-type-edit|disability-type-delete', ['only' => ['index','store']]);
         $this->middleware('permission:disability-type-create', ['only' => ['create','store']]);
         $this->middleware('permission:disability-type-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:disability-type-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disabilitypes = DisabilityType::orderBy('id','DESC')->get();
        return view('disability-types.index',compact('disabilitypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disability-types.create');
    }

    public function show($id)
    {
        $disabilitype = DisabilityType::find($id);
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
            'type' => 'required|unique:disability_types,type',
        ]);

        DisabilityType::create(['type' => $request->type]);
    
    
        return redirect()->route('disability-types.index')
                        ->with('success','Disability type added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disabilitype = DisabilityType::find($id);
        return view('disability-types.edit',compact('disabilitype'));
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
            'type' => 'required',
        ]);
    
        $disabilitype = DisabilityType::find($id);
        $disabilitype->type = $request->input('type');
        $disabilitype->save();

        return redirect()->route('disability-types.index')
                        ->with('success','Disability type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityType::find($id)->delete();
        return redirect()->route('disability-types.index')
                        ->with('success','Disability type deleted successfully');
    }
}
