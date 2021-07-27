<?php

namespace App\Http\Controllers;

use App\Models\DisabilityType;
use App\Models\Divyang;
use Illuminate\Http\Request;

class DivyangController extends Controller

{
    public function index(Request $request)
    {
        if(isset($request->disability_type)){
            $value = $request->{$request->parameter};
            $disabilityTypeId = DisabilityType::where('type', $request->disability_type)->firstOrFail()->id;
            $divyangs = Divyang::whereHas('disabilityTypes',function($query) use($disabilityTypeId){
                $query->where('disability_type_id', $disabilityTypeId);
            })->where($request->parameter, $value)->get();
        }else{
            $divyangs = Divyang::all();
        }
        return view('divyang.index', compact('divyangs'));
    }

    public function create()
    {
        return view('divyang.create');
    }

    public function edit(Divyang $divyang)
    {
        return view('divyang.edit', compact('divyang'));
    }

    public function show(Divyang $divyang)
    {
        return view('divyang.show', compact('divyang'));
    }
}