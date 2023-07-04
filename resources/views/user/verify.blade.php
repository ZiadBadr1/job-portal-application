@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-center mt-5">
            <div class="card">
                <div class="card-header">
                    Verify Account
                </div>
                <div class="card-body">
                    <p>Your account is not verified , please verify your account first
                        <a href="{{route('resend.email')}}"> Resend verification email</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
