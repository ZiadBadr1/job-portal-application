@extends('layouts.app')

@section('content')
    <div class="msg-container">
        <div class="msg">
            <h1 class="warning">Warning !!</h1>
            <h2 class="msg-caption">Please Verify Your Email.</h2>
        </div>
    </div>

    <style>

        .msg-container{
            height: 95vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .msg{
            padding-left: 200px;
            padding-right: 200px;
            padding-top: 50px;
            padding-bottom: 50px;
            text-align: center;
            border: 2px solid white;
            border-radius: 20px;
            box-shadow: 0px 5px 10px 0px black;
        }
        .warning{
            margin-bottom: 50px;
            color: red;
            font-size: 30px;
            letter-spacing: 1px;
        }
        .msg-caption{
            font-size: 35px;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
@endsection
