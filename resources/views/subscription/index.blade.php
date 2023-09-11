@extends('layouts.app')

@section('content')

    <style>
        body {
            background-color: #ddd;
        }

        .contanier {
            position: absolute;
            top: 25%;
            justify-content: center;
            display: flex;
        }

        .flex {
            width: 350px;
            margin-left: 50px;
            background-color: #fff;
            text-align: center;
        }

        .type {
            padding-top: 30px;
            background-color: #73d19a;
            color: #fff;
            height: 150px;
            border-bottom: #068139 1px solid;
        }

        .user {
            display: block;
            margin-bottom: 30px;
            font-size: 25px;
            font-weight: bold;
        }

        .cost {
            font-weight: bold;
            font-size: 55px;
        }

        .duration {
            font-weight: 100;
            margin-left: 20px;
            font-size: 20px;
        }

        ul {
            color: black;
            line-height: 30px;
            padding: 0;
            list-style-type: none;
        }

        li {
            font-size: 18px;
            position: relative;
            padding-left: 20px;
        }

        li::before {
            content: "";
            position: absolute;
            left: 125px;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 5px;
            background-color: black;
        }

        .payBtn {
            font-size: 27px;
            font-weight: 550;
            background-color: #068139;
            width: 200px;
            height: 60px;
            border: none;
            border-radius: 10px;
            color: #fff;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .payBtn:hover {
            background-color: rgb(5, 174, 64);
        }


    </style>
    @if(Session::has('message'))
        <div class="alert alert-warning"
             style="margin-top: 110px ;width: 75% ;margin-left: 180px">{{Session::get('message')}}</div>
    @endif
    <div class="contanier">

        <div class="flex" style="margin-left: 180px">
            <div class="type">
                <span class="user">For Team</span>
                <span class="cost">$20<span class="duration">Per Weak</span></span>
            </div>
            <div class="detail">
                <ul>
                    <li>15 Users</li>
                    <li>Feature 2</li>
                    <li>Feature 3</li>
                    <li>Feature 4</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.weekly')}}" class="card-link">
                        <button class="payBtn">Pay</button>
                    </a>
                </div>
            </div>
        </div>


        <div class="flex">
            <div class="type" style="background-color: #068139;">
                <span class="user">Personal</span>
                <span class="cost">$80<span class="duration">Per Month</span></span>
            </div>
            <div class="detail">
                <ul>
                    <li>15 Users</li>
                    <li>Feature 2</li>
                    <li>Feature 3</li>
                    <li>Feature 4</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.monthly')}}" class="card-link">
                        <button class="payBtn">Pay</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="type">
                <span class="user">Business</span>
                <span class="cost">$200<span class="duration">Per Year</span></span>
            </div>
            <div class="detail">
                <ul>
                    <li>15 Users</li>
                    <li>Feature 2</li>
                    <li>Feature 3</li>
                    <li>Feature 4</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.yearly')}}" class="card-link">
                        <button class="payBtn">Pay</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="container" style="margin-top: 180px">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--            @if(Session::has('message'))--}}
    {{--                <div class="alert alert-warning">{{Session::get('message')}}</div>--}}
    {{--            @endif--}}
    {{--            <div class="col-md-4">--}}
    {{--                <div class="card" style="width: 18rem;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h5 class="card-title">Weekly - $20</h5>--}}
    {{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
    {{--                    </div>--}}
    {{--                    <ul class="list-group list-group-flush">--}}
    {{--                        <li class="list-group-item">An item</li>--}}
    {{--                        <li class="list-group-item">A second item</li>--}}
    {{--                        <li class="list-group-item">A third item</li>--}}
    {{--                    </ul>--}}
    {{--                    <div class="card-body text-center">--}}
    {{--                        <a href="{{route('pay.weekly')}}" class="card-link">--}}
    {{--                            <button class="btn btn-success">Pay</button>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-4">--}}
    {{--                <div class="card" style="width: 18rem;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h5 class="card-title">Monthly - $80</h5>--}}
    {{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
    {{--                    </div>--}}
    {{--                    <ul class="list-group list-group-flush">--}}
    {{--                        <li class="list-group-item">An item</li>--}}
    {{--                        <li class="list-group-item">A second item</li>--}}
    {{--                        <li class="list-group-item">A third item</li>--}}
    {{--                    </ul>--}}
    {{--                    <div class="card-body text-center">--}}
    {{--                        <a href="{{route('pay.monthly')}}" class="card-link">--}}
    {{--                            <button class="btn btn-success">Pay</button>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-4">--}}
    {{--                <div class="card" style="width: 18rem;">--}}
    {{--                    <div class="card-body">--}}
    {{--                        <h5 class="card-title">Yearly - $200</h5>--}}
    {{--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>--}}
    {{--                    </div>--}}
    {{--                    <ul class="list-group list-group-flush">--}}
    {{--                        <li class="list-group-item">An item</li>--}}
    {{--                        <li class="list-group-item">A second item</li>--}}
    {{--                        <li class="list-group-item">A third item</li>--}}
    {{--                    </ul>--}}
    {{--                    <div class="card-body text-center">--}}
    {{--                        <a href="{{route('pay.yearly')}}" class="card-link">--}}
    {{--                            <button class="pay">Pay</button>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection
