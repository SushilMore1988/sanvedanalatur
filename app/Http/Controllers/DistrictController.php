<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;

class DistrictController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:district-list|district-create|district-edit|district-delete', ['only' => ['index','store']]);
         $this->middleware('permission:district-create', ['only' => ['create','store']]);
         $this->middleware('permission:district-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:district-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $districts = District::orderBy('id','DESC')->get();
        return view('district.index',compact('districts'));
    }
    public function create()
    {
        return view('district.create');
    }
    public function show($id)
    {
        $district = District::find($id);
        return view('district.show',compact('district'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:districts,name',
            'state_id' => 'required',
            'country_id' => 'required',
        ]);

        District::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state]);


        return redirect()->route('district.index')
                        ->with('success','District added successfully');
    }
    public function edit($id)
    {
        $district = District::find($id);
        return view('district.edit',compact('district'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
        ]);

        $district = District::find($id);
        $district->name = $request->input('name');
        $district->country_id = $request->input('country_id');
        $district->state_id = $request->input('state_id');
        $district->save();

        return redirect()->route('district.index')
                        ->with('success','District updated successfully');
    }
    public function destroy($id)
    {
        District::find($id)->delete();
        return redirect()->route('district.index')
                        ->with('success','District deleted successfully');
    }

}


