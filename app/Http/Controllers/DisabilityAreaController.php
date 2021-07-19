<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisabilityArea;

class DisabilityAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:disability-area-list|disability-area-create|disability-area-edit|disability-area-delete', ['only' => ['index','store']]);
         $this->middleware('permission:disability-area-create', ['only' => ['create','store']]);
         $this->middleware('permission:disability-area-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:disability-area-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $disabilityareas = DisabilityArea::orderBy('id','DESC')->get();
        return view('disability-areas.index',compact('disabilityareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disability-areas.create');
    }

    public function show($id)
    {
        $disabilityarea = DisabilityArea::find($id);
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
            'area' => 'required|unique:disability_areas,area',
        ]);

        DisabilityArea::create(['area' => $request->area]);
    
    
        return redirect()->route('disability-areas.index')
                        ->with('success','Disability Area added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disabilityarea = DisabilityArea::find($id);
        return view('disability-areas.edit',compact('disabilityarea'));
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
            'area' => 'required',
        ]);
    
        $disabilityarea = DisabilityArea::find($id);
        $disabilityarea->area = $request->input('area');
        $disabilityarea->save();

        return redirect()->route('disability-areas.index')
                        ->with('success','Disability area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisabilityArea::find($id)->delete();
        return redirect()->route('disability-areas.index')
                        ->with('success','Disability area deleted successfully');
    }
}
