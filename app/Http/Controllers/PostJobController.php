<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditJobRequest;
use App\Http\Requests\PostJopRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostJobController extends Controller
{

    public function __construct()
    {
        $this->middleware['isPremiumUser']->only(['create','store']);
    }
    public function index()
    {
        $jobs = Listing::where('user_id',auth()->user()->id)->get();
        return view('job.index',compact('jobs'));
    }
    public function create()
    {
        return view('job.create');
    }

    public function getImagePath(Request $data)
    {
        return $data->file('feature_image')->store('images','public');
    }
    public function store(PostJopRequest $request)
    {
        $imagePath = $this->getImagePath($request);
        $post = new Listing;
            $post->feature_image = $imagePath;
            $post->user_id = auth()->user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->roles =$request->roles;
            $post->job_type =$request->job_type;
            $post->address = $request->address;
            $post->salary =  $request->salary;
            $post->application_close_date = \Carbon\Carbon::createFromFormat('d/m/Y',$request->date)->format('Y-m-d');
            $post->slug = Str::slug($request->title).'.'.Str::uuid();
            $post->save();
            return back();
    }

    public function edit(Listing $listing)
    {
        return view('job.edit' ,compact('listing'));
    }
    public function update( EditJobRequest $request ,$id )
    {
        if($request->hasFile('feature_image'))
        {
            Listing::findorFail($id)->update(['feature_image'=>$this->getImagePath($request)]);
        }
        Listing::findorFail($id)->update($request->except('feature_image'));
        return back()->with('success','Your job has been successfully updated');
    }

    public function destroy($id)
    {
        Listing::findorFail($id)->delete();
        return back()->with('success','Your job post has been successfully deleted');
    }
}
