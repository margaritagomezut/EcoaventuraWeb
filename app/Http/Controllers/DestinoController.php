<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinoController extends Controller
{
    public function index()
    {
        return view('admin.destinos.index');
    }
}
