@extends('layouts.admin.main')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Your jobs
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created on</th>
                                <th>Total applicants</th>
                                <th>View job</th>
                                <th>View applicants</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($listings as $listing)
                                <tr>
                                    <td>{{$listing->title}}</td>
                                    <td>{{$listing->created_at}}</td>
                                    <td>{{$listing->users_count}}</td>
                                    <td>View</td>
                                    <td><a href="{{route('applicant.show',$listing->slug)}}">View</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
