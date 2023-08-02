<?php

namespace App\Http\Controllers;

use App\Mail\RejectedMail;
use App\Mail\ShortlistMail;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{

    public function __construct()
    {
        $this->middleware('isEmployer')->except(['apply']);
    }
    public function index()
    {
        $listings = Listing::latest()->withCount('users')->where('user_id',auth()->user()->id)->get();
        return view('applicants.index',compact('listings'));
    }
    public function show(Listing $listing)
    {
        $this->authorize('view',$listing);
//        if ($listing->user_id != auth()->user()->id)
//        {
//            abort(403);
//        }
        $listings = Listing::with('users')->where('slug',$listing->slug)->first();
//        dd($listings)
        return view('applicants.show',compact('listings'));
    }
    public function shortlist($listing_id,$user_id)
    {

        $listing = Listing::findorFail($listing_id);
        $user =  $listing->users()->where('user_id',$user_id)->first();

        if($listing)
        {
            if($user->pivot->rejected == 1)
            {
                $listing->users()->updateExistingPivot($user_id,['rejected'=>false]);
            }
            $listing->users()->updateExistingPivot($user_id,['shortlisted'=>true]);
            Mail::to($user->email)->queue(new ShortlistMail($listing->title,$user->name));
            return back()->with('success','User is shortlisted successfully');
        }
        else
        {
            return back();
        }
    }

    public function rejected($listing_id,$user_id)
    {
        $listing = Listing::findorFail($listing_id);
        $user =  $listing->users()->where('user_id',$user_id)->first();
        if($listing)
        {
            if($user->pivot->shortlisted == 1)
            {
                $listing->users()->updateExistingPivot($user_id,['shortlisted'=>false]);
            }
            $listing->users()->updateExistingPivot($user_id,['rejected'=>true]);
//            return $listing->users()->where('user_id',$user_id)->first();
            Mail::to($user->email)->queue(new RejectedMail($listing->title,$user->name));
            return back()->with('success','User is rejected successfully');
        }
        else
        {
            return back();
        }
    }
    public function apply($listingId)
    {
        $user = auth()->user();
        $user->listings()->syncWithoutDetaching($listingId);
        return back()->with('success','Your application was successfully submited');
    }
}
