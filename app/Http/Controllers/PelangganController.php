<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $showmenu = auth()->user()->isAdmin;
        return view('pages.pelanggan', compact('showmenu'));
    }
}
