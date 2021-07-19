<?php

namespace App\Http\Controllers;

use App\Models\Divyang;

class DivyangController extends Controller
{
    public function index()
    {
        $divyangs = Divyang::all();
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