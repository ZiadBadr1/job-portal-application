@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for an employee?</h1>
                <h3>Please create an account</h3>
                <img src="{{asset('image/register.jpg')}}" width="300" class="img-responsibe">
            </div>

            <div class="col-md-6 ">
                <div class="card" id="card" style="margin-top:50px;">
                    <div class="card-header">Employer Registration</div>
                    <form action="{{route('store.employee')}}" method="post" id="">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Company name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" required>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
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
