<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function reports()
    {
        return view('reports.index');
    }
}
