@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 45px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('company',[$listing->profile->id])}}">
                            <img src="{{Storage::url($listing->profile->profile_pic)}}" class="companyImg" width="80" height="80px" class="rounded-circle">
                        </a>

                        <P class="UpperTitle">{{$listing->title}}<span>{{$listing->profile->name}}</span></P>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        <span class="badge bg-success">{{$listing->job_type}}</span>
                        <P class="title">Salary: <span>${{number_format($listing->salary,2)}}</span></p>
                        <P class="title">Address: <span>{{$listing->address}}</span></P>
                        <h4 class="title">Description</h4>
                        <p class="card-text">{!! $listing->description!!}</p>

                        <h4 class="title"> Roles and Responsibilities</h4>
                        {!!$listing->roles!!}

                        <p class="title">Application closing date: <span>{{$listing->application_close_date}}</span></p>

                        @if(Auth::check())
                            @if(auth()->user()->user_type=='employer' || auth()->user()->email_verified_at == null)
                                <div>
                                    <br>
                                    <p>
                                        <b>You can't apply</b>
                                    </p>
                                </div>
                            @elseif(auth()->user()->resume)
                                <form action="{{route('application.submit',[$listing->id])}}" method="POST">@csrf
                                    <button href="#" class="applyBtn">Apply</button>
                                    @else
                                        <button type="button" class="applyBtn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                            Apply
                                        </button>
                                </form>
                            @endif
                        @else
                            <p>Please login to apply</p>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <form action="{{route('application.submit',[$listing->id])}}" method="POST">@csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload resume</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file"/>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnApply" class="applyBtn" disabled class="btn btn-success btn-lg">
                                                Apply
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .companyImg {
            margin-bottom: 10px;
        }

        .UpperTitle {
            font-size: 25px;
            font-weight: bold;
            color: rgb(0, 112, 67);
            margin-bottom: 20px;
        }

        .UpperTitle span {
            color: rgb(5, 174, 64);
            padding-left: 3px;
            margin-left: 5px;
            font-size: 15px;
            border-left: 2px solid rgb(5, 174, 64);
        }

        .title {
            margin-bottom: 2px;
            color: rgb(0, 112, 67);
            font-size: 20px;
            font-weight: bold;
        }

        .title span {
            color: rgb(95, 95, 95);
            font-size: 15px;
            font-weight: 500;
        }
        .salary {
            margin-bottom: 10px;
        }
        .applyBtn {
            font-size: 17px;
            background-color: rgb(0, 112, 67);
            width: 100px;
            height: 40px;
            border: none;
            border-radius: 20px;
            color: #fff;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .applyBtn:hover {
            background-color: rgb(5, 174, 64);
        }

        .card {
            margin-top: 9%;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.2);
        }

        .companyImg {
            border-radius: 20px;
        }

    </style>

    <script>
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        pond.setOptions({
            server: {
                url: '/resume/upload',
                process: {
                    method: 'POST',
                    withCredentials: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    },
                    ondata: (formData) => {
                        formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                        return formData
                    },
                    onload: (response) => {
                        document.getElementById('btnApply').removeAttribute('disabled')
                    },
                    onerror: (response) => {
                        console.log('error while uploading....', response)
                    },

                },
            },
        });
    </script>
@endsection
