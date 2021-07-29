<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function index(Request $request)
    {
        $abouts = Aboutus::orderBy('id','DESC')->get();
        return view('about.index',compact('abouts'));
    }

    public function create()
    {
            return view('about.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'test' => 'required|unique:aboutuses,test',
            'img' => 'required|unique:aboutuses,img',

        ]);

        Aboutus::create(['test' => $request->test,'img'=>$request->img]);
    
    
        return redirect()->route('about.index')
                        ->with('success','AboutUs Area added successfully');
    }
    
    public function show($id)
    {
        $abouts = Aboutus::find($id);
        return view('about.show',compact('abouts'));
    }

    public function edit($id)
    {
        $abouts = Aboutus::find($id);
        return view('about.edit',compact('abouts'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'test' => 'required',
            'img' => 'required',

        ]);
    
        $abouts = Aboutus::find($id);
        $abouts->test = $request->input('test');
        $abouts->img = $request->input('img');
        $abouts->save();

        return redirect()->route('about.index')
                        ->with('success','AboutUs area updated successfully');
    }

   
    public function destroy($id)
    {
        Aboutus::find($id)->delete();
        return redirect()->route('about.index')
                        ->with('success','AboutUs area deleted successfully');
    }
}
