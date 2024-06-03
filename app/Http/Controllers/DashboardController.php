<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       // Pastikan pengguna sudah terotentikasi sebelum memeriksa isAdmin
        // if (auth()->check()) {
            $showmenu = auth()->user()->isAdmin();
            return view('pages.dashboard', compact('showmenu'));
        // } else {
        //     // Redirect ke halaman login jika pengguna belum masuk
        //     return redirect()->route('login');
        // }
    }

    public function admin()
    {
        return view('pages.dashboard');
    }

}
