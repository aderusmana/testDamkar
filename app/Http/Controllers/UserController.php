<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboardKelompok()
    {
        return view('kelompok.dashboard');
    }
    public function dashboardApel()
    {
        return view('apel.dashboard');
    }
}
