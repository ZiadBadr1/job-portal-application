@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row">

            <div class="col-md-6 ">
                <form action="{{route('store')}}" method="post" id="registrationForm">
                    @csrf
                    <div class="card-body">
                        <div class="signBox">
                            <h1>Sign UP</h1>
                            <div class="form-group">
                                <input type="text" name="name" class="fullname" placeholder="Full name"
                                       value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="mail" placeholder="Email"
                                       value="{{old('email')}}">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="pass" placeholder="password">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="radio-group">
                                <label class="radio-label">Type:</label>
                                <input type="radio" name="type" id="employer" value="employer">
                                <label class="radio-button" for="employer">Employer</label>
                                <input type="radio" name="type" id="seeker" value="seeker">
                                <label class="radio-button" for="seeker">Seeker</label>
                            </div>
                            @if($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type')}}</span>
                            @endif
                            <div class="form-group">
                                <button class="logBtn" id="btnRegister">Sign UP</button>
                            </div>
                            <P>Have an account? <a href="{{route('login')}}">Sign in</a></P>
                        </div>
                    </div>
                </form>
            </div>
            <div id="message"></div>
        </div>
    </div>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: white;
            position: relative;
        }

        .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 65vh;
        }

        .signBox {
            text-align: center;
            position: absolute;
            left: 35%;
            top: 23%;
            width: 500px;
            height: 530px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 79px 93px 215px 176px rgba(0, 0, 0, 0.2);
        }

        .signBox h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: bolder;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .fullname, .pass, .mail {
            display: block;
            margin-top: 10px;
            margin-left: 22%;
            width: 300px;
            height: 40px;
            border: none;
            padding-left: 20px;
            background-color: rgba(236, 236, 236, 0.979);
            border-radius: 20px;
            margin-bottom: 12px;
        }

        .signBox input::placeholder {
            padding-left: 20px;
            color: gray;
            text-transform: uppercase;
        }

        .signBox .forget {
            text-transform: uppercase;
            color: rgb(5, 174, 64);
            display: block;
            font-weight: bold;
            margin-top: 5px;
        }

        p {
            color: gray;
        }

        p a {
            text-decoration: none;
            color: rgb(5, 174, 64);
            font-weight: 600;
        }

        .logBtn {
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
        }

        .logBtn:hover {
            background-color: rgb(0, 112, 67);
        }

        .radio-group {
            margin-left: 125px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-family: Arial, sans-serif;
        }

        .radio-label {
            font-weight: bold;
        }

        .radio-button {
            position: relative;
            display: inline-block;
            padding-left: 25px;
            cursor: pointer;
        }

        .radio-button::before {
            content: "";
            position: absolute;
            left: 0;
            top: 2px;
            width: 16px;
            height: 16px;
            border: 2px solid #ccc;
            border-radius: 50%;
            background-color: white;
            transition: border-color 0.3s;
        }

        .radio-button:hover::before {
            border-color: rgb(0, 112, 67); /* Change border color on hover */
        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"]:checked + .radio-button::before {
            border-color: rgb(0, 112, 67); /* Change border color when checked */
            background-color: rgb(0, 112, 67); /* Change background color when checked */
        }

        /* Add more styles as needed */

    </style>

    {{--    <script>--}}
    {{--        var url = "{{route('store')}}";--}}
    {{--        document.getElementById("btnRegister").addEventListener("click", function (event) {--}}
    {{--            var form = document.getElementById("registrationForm");--}}
    {{--            var card = document.getElementById("card");--}}
    {{--            var messageDiv = document.getElementById('message')--}}
    {{--            messageDiv.innerHTML = ''--}}
    {{--            var formData = new FormData(form)--}}

    {{--            var button = event.target--}}
    {{--            button.disabled = true;--}}
    {{--            button.innerHTML = 'Sending email.... '--}}

    {{--            fetch(url, {--}}
    {{--                method: "POST",--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': '{{csrf_token()}}'--}}
    {{--                },--}}
    {{--                body: formData--}}
    {{--            }).then(response => {--}}
    {{--                if (response.ok) {--}}
    {{--                    return response.json();--}}
    {{--                } else {--}}
    {{--                    throw new Errror('Error')--}}
    {{--                }--}}
    {{--            }).then(data => {--}}
    {{--                button.innerHTML = 'S'--}}
    {{--                button.disabled = false--}}
    {{--                messageDiv.innerHTML = '<div class="alert alert-success">Registration was successful.Please check your email to verify it</div>'--}}
    {{--                card.style.display = 'none'--}}
    {{--            }).catch(error => {--}}
    {{--                console.log(error)--}}
    {{--                button.innerHTML = 'Sign UP'--}}
    {{--                button.disabled = false--}}
    {{--                messageDiv.innerHTML = '<div class="alert alert-danger" style="width: 380px;margin-left: 480px">Something went wrong. Please try again</div>'--}}

    {{--            })--}}
    {{--        })--}}
    {{--    </script>--}}

    <script>
        document.querySelector('.register').classList.add("active");
    </script>
@endsection
