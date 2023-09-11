@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-10 mt-5">

                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif

                <h2>Update your profile</h2>
                <form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="logo" style="margin-bottom: 5px">Profile Image</label>
                            <input type="file" class="form-control" id="logo" name="profile_pic">
                            @if(auth()->user()->profile_pic)
                                <img src="{{Storage::url(auth()->user()->profile_pic)}}" width="150" class="mt-3">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Your name</label>
                            <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                        </div>
                        @if($errors->has('name'))
                            <div class="error"> {{$errors->first('name')}}  </div>
                        @endif
                        <div class="form-group mt-4">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 mt-5">

                    <h2>Change your password</h2>

                    <form action="{{route('user.password')}}" method="post">@csrf
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="current_password">Your current password</label>
                                <input type="password" name="current_password" class="form-control"
                                       id="current_password">
                            </div>
                            @if($errors->has('current_password'))
                                <div class="error"> {{$errors->first('current_password')}}  </div>
                            @endif
                            <div class="form-group">
                                <label for="password">Your new password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            @if($errors->has('password'))
                                <div class="error"> {{$errors->first('password')}}  </div>
                            @endif
                            <div class="form-group">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       id="password_confirmation">
                                @if($errors->has('password_confirmation'))
                                    <div class="error"> {{$errors->first('password_confirmation')}}  </div>
                                @endif
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 mt-5">

                    <h2>Update your resume</h2>

                    <form action="{{route('upload.resume')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="resume"> Upload a resume</label>
                                <input type="file" name="resume" class="form-control" id="resume">
                            </div>
                            @if($errors->has('resume'))
                                <div class="error"> {{$errors->first('resume')}}  </div>
                            @endif
                            <div class="form-group mt-4">
                                <button class="btn btn-success" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <style>
        .form-group input{
            margin-top: 7px;
            margin-bottom: 10px;
        }
    </style>
@endsection
