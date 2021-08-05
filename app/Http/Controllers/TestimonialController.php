<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:testimonial-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:testimonial-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $testimonials = Testimonial::orderBy('id','DESC')->get();
        return view('testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('testimonial.create');

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
            'name' => 'required|unique:testimonials,name',
            'discription' => 'required|unique:testimonials,discription',
            // 'img' => 'required|unique:testimonials,img',

        ]);
        if ($request->file('img') == null) {
            $file = "/storage/Testimonial";
        }else{
           $file = $request->file('img')->store('images');  
        }

        Testimonial::create(['name' => $request->name,'discription'=>$request->discription,'img'=>$request->img]);
    
    
        return redirect()->route('testimonial.index')
                        ->with('success','Testimonial Area added successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonials = Testimonial::find($id);
        return view('testimonial.show',compact('testimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonials = Testimonial::find($id);
        return view('testimonial.edit',compact('testimonials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'discription' => 'required',
            'img' => 'required',

        ]);
    
        $testimonials = Testimonial::find($id);
        $testimonials->name = $request->input('name');
        $testimonials->discription = $request->input('discription');
        $testimonials->img = $request->input('img');
        $testimonials->save();

        return redirect()->route('testimonial.index')
                        ->with('success','Testimonial area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        testimonial::find($id)->delete();
        return redirect()->route('testimonial.index')
                        ->with('success','Testimonial area deleted successfully');
    }
}
