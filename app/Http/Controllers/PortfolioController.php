<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    
    //
    public function welcome()
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $basicinfo = BasicInformation::where('user_id', Auth::user()->id)->first();
        return view('themes.dev.o1.index',compact('basicinfo'));
    }

    public function projects()
    {
        return view('themes.dev.o1.projects');
    }

    public function posts()
    {
        return view('themes.dev.o1.posts');
    }

}
