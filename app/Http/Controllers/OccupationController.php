<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupation;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:occupation-list|occupation-create|occupation-edit|occupation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:occupation-create', ['only' => ['create','store']]);
         $this->middleware('permission:occupation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:occupation-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $occupations = Occupation::orderBy('id','DESC')->get();
        return view('occupations.index',compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('occupations.create');
    }

    public function show($id)
    {
        $occupation = Occupation::find($id);
        return view('occupations.show',compact('occupation'));
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
            'name' => 'required|unique:occupations,name',
        ]);

        Occupation::create(['name' => $request->name]);
    
    
        return redirect()->route('occupations.index')
                        ->with('success','Occupation added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupation = Occupation::find($id);
        return view('occupations.edit',compact('occupation'));
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
    
        $occupation = Occupation::find($id);
        $occupation->name = $request->input('name');
        $occupation->save();

        return redirect()->route('occupations.index')
                        ->with('success','Occupation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Occupation::find($id)->delete();
        return redirect()->route('occupations.index')
                        ->with('success','Occupation deleted successfully');
    }
}
