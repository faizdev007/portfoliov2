<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\Projects;
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
        $basicinfo = BasicInformation::with(['user','user.projects'=> function ($query) {
            $query->limit(6);
        }])->where('user_id', Auth::user()->id)->first();
        return view('themes.dev.o1.index',compact('basicinfo'));
    }

    public function projects()
    {
        $projects = Projects::where('user_id',Auth::id())->latest()->paginate(10);
        return view('themes.dev.o1.projects',compact('projects'));
    }

    public function posts()
    {
        return view('themes.dev.o1.posts');
    }

    public function updateskill(Request $request)
    {
        dd($request->all());
    }
}
