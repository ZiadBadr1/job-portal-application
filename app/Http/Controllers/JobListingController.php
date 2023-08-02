<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {

        $salary = $request->query('salary');
        $date = $request->query('date');
        $job_type = $request->query('job_type');

        $listing = Listing::query();

        if ($salary === 'High_to_low')
        {
            $listing->orderByRaw('CAST(salary AS UNSIGNED) DESC');
        }
        elseif ($salary === 'Low_to_high')
        {
            $listing->orderByRaw('CAST(salary AS UNSIGNED) ASC');
        }
        if ($date === 'latest')
        {
            $listing->orderBy('created_at','desc');
        }
        elseif ($date === 'oldest')
        {
            $listing->orderBy('created_at','asc');
        }

        if ($job_type === 'Fulltime')
        {
            $listing->where('job_type','Fulltime');
        }
        elseif ($job_type === 'Parttime')
        {
            $listing->where('job_type','Parttime');
        }
        elseif ($job_type === 'Casual')
        {
            $listing->where('job_type','Casual');
        }
        elseif ($job_type === 'Contract')
        {
            $listing->where('job_type','Contract');
        }

        $jobs = $listing->with('profile')->get();
        return view('home',compact('jobs'));
    }
    public function show(Listing $listing)
    {
//        $listing = Listing::with('users')->where('slug',$listing->slug)->first();
        return view('show',compact('listing'));

    }
    public function company($id)
    {
        $company = User::with('jobs')->where('id',$id)->where('user_type','employer')->first();
        return view('company' , compact('company'));
    }
}
