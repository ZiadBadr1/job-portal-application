@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('message')
                <div class="container">
                    <form action="{{route('login.post')}}" method="post">@csrf
                        <div class="card-body">
                            <div class="loginBox">
                                <h1>LOGIN</h1>
                                <div class="form-group">
                                    <input type="text" name="email" class="fname" placeholder="Username">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="pass" name="password" placeholder="password" >
                                    @if($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password')}}</span>
                                    @endif
                                </div>
                                <span class="forget">Forget Password?</span>
                                <div class="form-group text-center">
                                    <button class="logBtn">Sign in</button>
                                </div>
                                <P>Not registered? <a href="{{route('register')}}">Create an account</a></P>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: white;
            position: relative;
        }
        .card-body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .loginBox{
            text-align: center;
            position: absolute;
            left: 35%;
            top: 23%;
            width: 500px;
            height: 450px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 79px 93px 215px 176px rgba(0, 0, 0, 0.2);
        }.loginBox h1{
             font-size: 50px;
             font-weight: bolder;
             margin-top: 20px;
             margin-bottom: 50px;
         }.loginBox input{
              display: block;
              margin-top: 10px;
              margin-left: 22%;
              width: 300px;
              height: 40px;
              border: none;
              padding-left: 20px;
              background-color: rgba(236, 236, 236, 0.979);
              border-radius: 20px;
              margin-bottom: 15px;
          }.loginBox input::placeholder{
               padding-left: 20px;
               color: gray;
               text-transform: uppercase;
           }.loginBox .forget{
                text-transform: uppercase;
                color: rgb(5, 174, 64);
                display: block;
                font-weight: bold;
                margin-top: 5px;
            }p{
                 color: gray;
             }p a{
                  text-decoration: none;
                  color: rgb(5, 174, 64);
                  font-weight: 600;
              }.logBtn{
                   text-transform: uppercase;
                   font-size: 20px;
                   background-color: rgb(5, 174, 64);
                   width: 250px;
                   height: 50px;
                   border: none;
                   border-radius: 30px;
                   font-weight: bold;
                   color: #fff;
                   margin-top: 30px;
               }.logBtn:hover{
                    background-color: rgb(0, 112, 67);
                }
    </style>

    <script>
        document.querySelector('.login').classList.add("active");
    </script>
@endsection
