<?php

namespace App\Http\Controllers;

use App\Models\DisabilityType;
use App\Models\Divyang;
use Illuminate\Http\Request;

class DivyangController extends Controller
{
    public function index(Request $request)
    {
        $disabilityTypeId = null;
        if(isset($request->disability_type)){
        //     $value = $request->{$request->parameter};
            $disabilityTypeId = DisabilityType::where('type', $request->disability_type)->firstOrFail()->id;
        //     $divyangs = Divyang::whereHas('disabilityTypes',function($query) use($disabilityTypeId){
        //         $query->where('disability_type_id', $disabilityTypeId);
        //     })->where($request->parameter, $value)->get();
        // }else{
        //     $divyangs = Divyang::all();
        }
        
        $divyangs = Divyang::when($request->parameter, function($query) use ($request){
                                $query->where($request->parameter, $request->{$request->parameter});
                            })->when($request->disability_type, function($query) use ($disabilityTypeId){
                                $query->whereHas('disabilityTypes',function($query) use($disabilityTypeId){
                                    $query->where('disability_type_id', $disabilityTypeId);
                                });
                            })->get();
        return view('divyang.index', compact('divyangs'));
    }

    public function create()
    {
        return view('divyang.create');
    }

    public function edit($id)
    {
        return view('divyang.edit', compact('id'));
    }
}