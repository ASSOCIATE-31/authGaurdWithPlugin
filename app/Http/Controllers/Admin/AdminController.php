<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
     /**
     * Display a listing of the resource.
     */
    public function profile()
    {
        return view('admin.profile');
    }
    
}
