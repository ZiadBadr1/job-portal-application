@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for a job?</h1>
                <h3>Please create an account</h3>
                <img src="{{asset('image/register.jpg')}}" width="300" class="img-responsibe">
            </div>

            <div class="col-md-6 ">
                <div class="card" id="card" style="margin-top:50px;">
                    <div class="card-header">Register</div>
                    <form action="{{route('store.seeker')}}" method="post" id="registrationForm">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <button class="btn btn-primary" id=""> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
