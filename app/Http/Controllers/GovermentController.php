<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Goverment;
use Illuminate\Http\Request;

class GovermentController extends Controller
{

    public function index(Request $request)
    {
        $goverments = Goverment::orderBy('id','DESC')->get();
        return view('goverment.index',compact('goverments'));
    }

    public function create()
    {
            return view('goverment.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|unique:goverments,text',
            'link' => 'required|unique:goverments,link',

        ]);

        Goverment::create(['text' => $request->text,'link'=>$request->link]);
    
    
        return redirect()->route('goverment.index')
                        ->with('success','Goverment Area added successfully');
    }
    

    public function show($id)
    {
        $goverments = Goverment::find($id);
        return view('goverment.show',compact('goverments'));
    }

    public function edit($id)
    {
        $goverments = Goverment::find($id);
        return view('goverment.edit',compact('goverments'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required',
            'link' => 'required',
        ]);
    
        $goverments = Goverment::find($id);
        $goverments->text = $request->input('text');
        $goverments->link = $request->input('link');
        $goverments->save();

        return redirect()->route('goverment.index')
                        ->with('success','Goverment area updated successfully');
    }

    public function destroy($id)
    {
        goverment::find($id)->delete();
        return redirect()->route('goverment.index')
                        ->with('success','Goverments area deleted successfully');
    }
}
