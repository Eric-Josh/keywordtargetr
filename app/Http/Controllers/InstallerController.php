<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallerController extends Controller
{
    public function install()
    {
        return view('install');
    }
}
