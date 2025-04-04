<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function educationldata(){
        $testdata = Skill::get();
        return response()->json($testdata);
    }

    public function skillsearch(){
        $search = Skill::get();
        return response()->json($search);
    }
}
