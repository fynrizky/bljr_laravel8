<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $title='Users';
        return view('/user.data',
        [
            'title' => $title,
            // 'judul' => $judul,
        ]);
    }
}
