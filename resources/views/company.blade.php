@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 90px">

        <div class="jobs">
            <div class="companyDeatail">
                <img src="{{Storage::url($company->profile_pic)}}" class="companyImg" width="80" height="80px">
                <p class="title">{{$company->name}}</p>

                <div class="about">
                    <span class="title">About</span>
                    <P>{{$company->about}}</P>
                </div>
            </div>


            <div class="jobTitle">
                <h2>List of Jobs</h2>
            </div>
            <div class="jobContainer">

                @foreach($company->jobs as $job)
                    <div class="box">
                        <div class="innerBox">
                            <h4>{{$job->title}}</h4>
                            <div class="details">
                                <p><i class="fa-solid fa-location-dot"></i>{{$job->address}}</p>
                                <p><i class="fa-regular fa-clock"></i>Full Time</p>
                                <p><i class="fa-regular fa-money-bill-1"></i>${{number_format($job->salary,)}}</p>
                            </div>
                        </div>
                        <div class="innerBox2">
                            <a class="btn" href="{{route('job.show',[$job->slug])}}">View</a>
                            <p><i class="fa-solid fa-calendar-days"></i>{{$job->application_close_date}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .jobs {
            margin-left: 15%;
            width: 70%;
            margin-top: 20px;
        }

        .jobTitle::after {
            content: "";
            height: 4px;
            width: 175px;
            background-color: rgb(0, 112, 67);
            position: absolute;
        }

        .jobTitle::before {
            content: "";
            height: 4px;
            width: 200px;
            background-color: rgb(0, 112, 67);
            position: absolute;
            top: 43.5%;
            margin-top: 8px;
        }

        .filters span {
            padding-bottom: 2px;
            margin-left: 10px;
            font-weight: 500;
        }

        .activeFilter {
            border-bottom: 3px solid rgb(5, 174, 64);
        }

        .jobContainer {
            margin-top: 50px;
        }

        .box {
            height: 100px;
            display: flex;
            margin-top: 20px;
            background-color: #e7e7e7;
            border-radius: 5px;
        }

        .details {
            display: flex;
        }

        .details p {
            margin-right: 30px;
        }

        i {
            color: rgb(5, 174, 64);
            margin-right: 10px;
        }

        .innerBox {
            margin-left: 20px;
            margin-top: 12px;
        }

        .innerBox2 {
            margin-top: 12px;
            margin-left: 60%;
            margin-right: 15px;
        }

        .btn {
            width: 100px;
            margin-bottom: 3px;
            background-color: rgb(5, 174, 64);
            font-weight: bold;
            border-radius: 0px;
            color: #fff;
        }

        .title {
            margin-bottom: 2px;
            color: rgb(0, 112, 67);
            font-size: 20px;
            font-weight: bold;
        }

        .companyImg {
            border-radius: 50%;
        }

        .about {
            margin-top: 20px;
        }

        .about p {
            padding-left: 5px;
            font-style: italic;
        }

    </style>
    <script src="https://kit.fontawesome.com/608e9d3ec2.js" crossorigin="anonymous"></script>

@endsection
