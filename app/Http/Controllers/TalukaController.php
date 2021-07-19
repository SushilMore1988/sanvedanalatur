<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\District;
use App\Models\Taluka;



class TalukaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:taluka-list|taluka-create|taluka-edit|taluka-delete', ['only' => ['index','store']]);
         $this->middleware('permission:taluka-create', ['only' => ['create','store']]);
         $this->middleware('permission:taluka-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:taluka-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $talukas = Taluka::orderBy('id','DESC')->get();
        return view('taluka.index',compact('talukas'));
    }
    public function create()
    {
        return view('taluka.create');
    }
    public function show($id)
    {
        $taluka = Taluka::find($id);
        return view('taluka.show',compact('taluka'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:talukas,name',
            'state_id' => 'required',
            'district_id' => 'required',
            'country_id' => 'required',
        ]);

        Taluka::create(['name' => $request->name, 'country_id' => $request->country, 'state_id' => $request->state, 'district_id' => $request->district]);


        return redirect()->route('taluka.index')
                        ->with('success','Taluka added successfully');
    }
    public function edit($id)
    {
        $taluka = Taluka::find($id);
        return view('taluka.edit',compact('taluka'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
        ]);

        $taluka = Taluka::find($id);
        $taluka->name = $request->input('name');
        $taluka->country_id = $request->input('country_id');
        $taluka->state_id = $request->input('state_id');
        $taluka->district_id = $request->input('district_id');
        $taluka->save();

        return redirect()->route('taluka.index')
                        ->with('success','Taluka updated successfully');
    }
    public function destroy($id)
    {
        Taluka::find($id)->delete();
        return redirect()->route('taluka.index')
                        ->with('success','Taluka deleted successfully');
    }

}


