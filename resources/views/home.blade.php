@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="d-flex justify-content-between mt-5">
            <h4 style="margin-top: 30px">Recommended Jobs</h4>
            <div class="dropdown" style="margin-top: 30px">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Salary
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('home',['salary'=>'High_to_low'])}}">High to low</a></li>
                    <li><a class="dropdown-item" href="{{route('home',['salary'=>'Low_to_high'])}}">Low to high</a></li>

                </ul>
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Date
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('home',['date'=>'latest'])}}">Latest</a></li>
                    <li><a class="dropdown-item" href="{{route('home',['date'=>'oldest'])}}">Oldest</a></li>
                </ul>

                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    Job type
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('home',['job_type'=>'Fulltime'])}}">Fulltime</a></li>
                    <li><a class="dropdown-item" href="{{route('home',['job_type'=>'Parttime'])}}">Parttime</a></li>
                    <li><a class="dropdown-item" href="{{route('home',['job_type'=>'Casual'])}}">Casual</a></li>
                    <li><a class="dropdown-item" href="{{route('home',['job_type'=>'Contract'])}}">Contract</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-2 g-1">
            @foreach($jobs as $job)
                <div class="col-md-3">
                    <div class="card p-2 {{$job->job_type}}">
                        <div class="text-right"><small class="badge text-bg-success">{{$job->job_type}}</small></div>
                        <div class="text-center mt-2 p-3"><img class="rounded-circle" width="50"
                                                               src="{{Storage::url($job->profile->profile_pic)}}"
                                                               width="100"/> <br>
                            <span class="d-bl>ock font-weight-bold">{{$job->title}}</span>
                            <hr>
                            <span>{{$job->profile->name}}</span>
                            <div class="d-flex flex-row align-items-center justify-content-center">
                                <small class="ml-1">{{$job->address}}</small>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <span>${{number_format($job->salary,2)}}</span>
                                <a href="{{route('job.show',[$job->slug])}}">
                                    <button class="btn btn-success">Apply Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .card:hover{
            background-color: #efefef;
        }
        .dropdown-item:hover
        {
            color: #fff;
            border-color: #198754;
            background: #198754;
            background-color: #12b012;
        }
    </style>
    <script>
        document.querySelector('.home').classList.add("active");
    </script>
@endsection
