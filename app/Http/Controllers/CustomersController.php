<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $title='Customers';
        return view('/customer.data',
        [
            'title' => $title,
            // 'judul' => $judul,
        ]);
    }
}
