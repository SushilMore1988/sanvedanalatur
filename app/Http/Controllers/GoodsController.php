<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivyangGoods;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Imports\ImportGoods;
use App\Exports\ExportGoods;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:divyang-goods-list|divyang-goods-create|divyang-goods-edit|divyang-goods-delete', ['only' => ['index','store']]);
         $this->middleware('permission:divyang-goods-create', ['only' => ['create','store']]);
         $this->middleware('permission:divyang-goods-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:divyang-goods-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = DivyangGoods::orderBy('id','DESC')->get();
        return view('divyang-goods.index',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('divyang-goods.create');
    }

    public function show($id)
    {
        $good = DivyangGoods::find($id);
        return view('roles.show',compact('good'));
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
            'name' => 'required|unique:divyang_goods,name',
        ]);

        DivyangGoods::create(['name' => $request->name]);
    
    
        return redirect()->route('divyang-goods.index')
                        ->with('success','Goods added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good = DivyangGoods::find($id);
        return view('divyang-goods.edit',compact('good'));
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
    
        $good = DivyangGoods::find($id);
        $good->name = $request->input('name');
        $good->save();

        return redirect()->route('divyang-goods.index')
                        ->with('success','Goods updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DivyangGoods::find($id)->delete();
        return redirect()->route('divyang-goods.index')
                        ->with('success','Goods deleted successfully');
    }
    function import(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::load($path)->get();

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value){
                foreach($value as $row){
                    $insert_data[] = array(
                    'type'  => $row['type'],
                    );
                }
            }

            if(!empty($insert_data)){
                DB::table('divyang_goods')->insert($insert_data);
            }
        }
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new ExportGoods,'Goods.xlsx');
    }
    
    public function exportIntoCSV(){
        return Excel::download(new ExportGoods,'Goodslist.csv');
    }

    public function importes(Request $request){
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportGoods, request()->file('import_file'));
        return back()->with('success', 'Goods imported successfully.');
    }
 
    public function exports() 
    {
        return Excel::download(new ExportGoods, 'Goods.xlsx');
    }


}
