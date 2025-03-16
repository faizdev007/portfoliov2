<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function welcome()
    {
        return view('themes.dev.o1.index');
    }

    public function projects()
    {
        return view('themes.dev.o1.projects');
    }
}
