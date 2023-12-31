@extends('layouts.admin.main')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mt-5">
                @include('message')
                <h1 style="color: #212429;">{{$listings->title}}</h1>
            </div>
            @foreach($listings->users as $user)
                <div
                    class="card mt-5 {{$user->pivot->shortlisted?'card-bg' : ''}} {{$user->pivot->rejected?'card-bg2' : ''}}" style="width: 90% ;margin-left: 50px ;">
                    <div class="row g-0">
                        <div class="col-auto">
                            @if($user->profile_pic)
                                <img src="{{Storage::url($user->profile_pic)}}"  class="rounded-circle"
                                     style=" margin-top: 20px;width: 150px;" alt="Profile Picture">

                            @else
                                <img src="https://placehold.co/400" class="rounded-circle" style=" margin-top: 20px;width: 150px;"
                                     alt="Profile Picture">
                            @endif
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <p class="fw-bold" style="color: #212429;">{{$user->name}}</p>
                                <p class="card-text" style="color: #212429;">{{$user->email}}</p>
                                <p class="card-text" style="color: #212429;">Applied
                                    on: {{$user->pivot->created_at}}</p>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <a href="{{Storage::url($user->resume)}}" class="btn btn-primary" target="_blank">Download
                                Resume</a><br><br>
                            <form action="{{route('applicants.shortlist',[$listings->id,$user->id])}}" method="post"
                                  class="d-inline">
                                @csrf
                                <button type="submit"
                                        class="{{$user->pivot->shortlisted ? 'btn btn-success' : 'btn btn-dark'}}">short
                                    list
                                </button>
                            </form>
                            <form action="{{route('applicants.rejected',[$listings->id,$user->id])}}" method="post"
                                  class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                        class="{{$user->pivot->rejected ? 'btn btn-danger' : 'btn btn-dark'}}">Reject
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <style>
                .card-bg {
                    /*#7f181b*/
                    background-color: #35af77;
                    width: 90%;
                    margin-left: 50px;
                }

                .card-bg2 {
                    /*#7f181b*/
                    background-color: #fa5858;
                    width: 90%;
                    margin-left: 50px;
                }
            </style>
        </div>
    </div>

@endsection
