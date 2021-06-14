<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','store']]);
         $this->middleware('permission:admin-create', ['only' => ['create','store']]);
         $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    
    /**
     * display list of admins
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.create', compact('roles'));
    }
}