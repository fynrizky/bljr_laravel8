<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');//agar tidak bisa diakses jika belum login
    }
    public function dashbmethod()
    {
        // $judul='Belajar-Laravel-8';
        $titledashb='Dashboard';
        return view('/dashb',
        [
            'titledashb' => $titledashb,
            // 'judul' => $judul,
        ]);
    }
}
