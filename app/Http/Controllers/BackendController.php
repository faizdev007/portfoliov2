<?php

namespace App\Http\Controllers;

use App\Models\BasicInformation;
use App\Models\OtherInformation;
use App\Models\Projects;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BackendController extends Controller
{
    //
    

    public function aboutMe()
    {
        $info = OtherInformation::where('user_id', Auth::user()->id)->first();
        return view('aboutMe',compact('info'));
    }

    public function store(Request $request)
    {
        $check = Validator::make($request->all(), [
            'title' => 'required',
            'job_title' => 'required',
            'short_describtion' => 'required',
            'bio' => 'required',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $basicInformation = OtherInformation::where('user_id', Auth::user()->id)->first();
        
        if (!$basicInformation) {
            $basicInformation = new OtherInformation();
        }

        // Handle file uploads safely
        $basicInformation->avatar = $request->hasFile('avatar') 
        ? Controller::filesaver($request->file('avatar'), 'storage/avatars') 
        : ($basicInformation->avatar ?? null);
        
        $basicInformation->cover = $request->hasFile('cover') 
        ? Controller::filesaver($request->file('cover'), 'storage/covers') 
        : ($basicInformation->cover ?? null);
        
        try {
            // Fetch existing record or create new
            // Assign values
            $basicInformation->user_id = Auth::user()->id;
            $basicInformation->portfolioname = isset($request->portfolioname) ? Controller::generateUniqueSlug(Str::slug($request->portfolioname)) : Controller::generateUniqueSlug(Str::slug(Auth::user()->name));
            $basicInformation->title = $request->title;
            $basicInformation->fullname = $request->fullname;
            $basicInformation->email = $request->email;
            $basicInformation->short_describtion = $request->short_describtion;
            $basicInformation->bio = $request->bio;
            $basicInformation->job_title = $request->job_title;

            // Convert array fields to JSON
            $basicInformation->certifications = $request->certifications ? json_encode(array_filter($request->certifications, fn($value) => !is_null($value))) : null;
            $basicInformation->experience = $request->experience ? json_encode(array_filter($request->experience, fn($value) => !is_null($value))) : null;
            $basicInformation->education = $request->education ? json_encode(array_filter($request->education, fn($value) => !is_null($value))) : null;
            $basicInformation->skills = $request->skills ? json_encode(array_filter($request->skills, fn($value) => !is_null($value)))  : null;
            $basicInformation->interests = $request->interests ? json_encode(array_filter($request->interests, fn($value) => !is_null($value))) : null;
            $basicInformation->languages = $request->languages ? json_encode(array_filter($request->languages, fn($value) => !is_null($value))) : null;
            $basicInformation->social_links = $request->social_links ? json_encode(array_filter($request->social_links, fn($value) => !is_null($value))) : null;

            // Save or update
            $basicInformation->save();

            return back()->withSuccess('Profile updated successfully');
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }
    }

    public function projects(){
        $projectslist = Projects::where('user_id',Auth::user()->id)->get();
        return view('projects',compact('projectslist'));
    }

    public function submitproject(Request $request){
        $check = $request->validate([
            'title'=>'required',
            'url'=>'url',
        ]);

        $thumbnail = $request->hasFile('thumbnail') 
            ? Controller::filesaver($request->file('thumbnail'), 'storage/projects') 
            : Controller::getScreenshot($request->url);

        try {       
            $store = Projects::create([
                'title'=>$request->title,
                'user_id'=>Auth::user()->id,
                'slug'=>Str::slug($request->title),
                'thumbnail'=>$thumbnail,
                'url'=>$request->url ?? null,
                'short_description'=>$request->short_description ?? null,
                'description'=>$request->description ?? null,
                'is_public'=>$request->is_public ?? 0,
                'is_searchable'=>$request->is_searchable ?? 0,
                'is_active'=>$request->is_active ?? 0,
            ]);

            if (!$store){
                throw new \Exception("Data not saved");
            }

            // $returndata = Projects::get();

            return redirect()->route('portfolio.projects')->with('success', 'Submitted successfully');
            // return response()->json(['message' => 'Form submitted successfully!','data'=>$returndata], 200);
        } catch (\Throwable $th) {
            // Delete the file if the database save fails
            if ($thumbnail && file_exists(public_path('storage/projects/' . $thumbnail))) {
                unlink(public_path('storage/projects/' . $thumbnail));
            }

            return response()->json(['error' => 'Error saving data!'], 500);
        }

    }

    public function blogs(){
        $projectslist = Projects::where('user_id',Auth::user()->id)->get();
        return view('blogs',compact('projectslist'));
    }

    public function addblog(){
        return view('addblog');
    }
}
